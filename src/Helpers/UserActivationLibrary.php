<?php
/*
* This library contain, registration and activation functions.
* The main purpose is to generate activation token, send activation email, and activate the user
* Output: boolean
*/
namespace Tyondo\Sms\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Tyondo\Sms\Http\Notifications\newUserLogin;
use Tyondo\Sms\Http\Notifications\userAccountActivationNotification;
use Tyondo\Sms\Models\User;
use Carbon\Carbon;

class UserActivationLibrary
{
    protected $db; //activating
    protected $table = 'user_activations';
    protected $resendAfter = 24;
  /*
    Code for sending email Activation
  */
  /**
   * sends activation code to users upon registration
   *
   * @param  \App\User $user
   * @return \Illuminate\Http\Response
   */
  public function sendActivationMail($user)
    {
        if ($user->activated || !$this->shouldSend($user)) {
            return;
          }
        $userToken = $this->createActivation($user);
        //$userToken = User::find($user->id);
        $user->notify(new userAccountActivationNotification($userToken));
    }
    /**
     * sends activation code to users upon registration
     *
     * @param  App\User $user
     * @return string $activation
     */
  private function shouldSend($user)
    {
        $activation = $this->getActivation($user);
        return $activation === null || strtotime($activation->created_at) + 60 * 60 * $this->resendAfter < time();
    }
  public function activateUser($token)
    {
        $activation = $this->getActivationByToken($token);

        if ($activation === null) {
            return null;
        }

        $user = User::find($activation->user_id);

        $user->activated = true;

        $user->save();

        $this->deleteActivation($token);

        return $user;
    }
  /*
    Get the activation token from the activation tb using user_id
  */
  public function getActivation($user)
  {
    return DB::table($this->table)->where('user_id', $user->id)->first();
  }
  public function getActivationByToken($token)
  {
    return DB::table($this->table)->where('token', $token)->first();
  }
  public function deleteActivation($token)
  {
    return DB::table($this->table)->where('token', $token)->delete();
  }
  public function createActivation($user)
  {
    $activation = $this->getActivation($user);
      if (!$activation) {
        return $this->createToken($user);
      }
    return $this->regenerateToken($user);
  }
  protected function getToken()
  {
    return hash_hmac('sha256', str_random(40), config('app.key'));
  }
  private function generateToken($user)
  {
    $token = $this->getToken();
    DB::table($this->table)->where('user_id', $user->id)->update(['token'=> $token]);
    return $token;
  }
  private function regenerateToken($user)
  {
      $token = $this->getToken();
      DB::table($this->table)->where('user_id', $user->id)->update([
          'token' => $token,
          'created_at' => new Carbon()
      ]);
      return $token;
  }
  private function createToken($user)
  {
    $token = $this->getToken();
    DB::table($this->table)->insert([
      'user_id' => $user->id,
      'token' => $token,
    ]);
    return $token;
  }

}
