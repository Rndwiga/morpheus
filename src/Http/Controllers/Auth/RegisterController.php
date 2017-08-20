<?php

namespace Tyondo\Sms\Http\Controllers\Auth;

use Tyondo\Sms\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Tyondo\Sms\Helpers\UserActivationLibrary;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    private $userActivationLibrary;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->userActivationLibrary = new UserActivationLibrary;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'company' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'company' => str_slug($data['company']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    /**
     * overides register method in Illuminate\Foundation\Auth\RegistersUsers.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

        //  return $this->registered($request, $user)
        //    ?: redirect($this->redirectPath());

        //$user = $this->create($request->all());
        $this->userActivationLibrary->sendActivationMail($user);
        return redirect('/login')->with('activationStatus', true);
    }
}
