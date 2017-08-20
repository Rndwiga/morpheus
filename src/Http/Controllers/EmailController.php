<?php

namespace Tyondo\Email\Http\Controllers;

use Illuminate\Http\Request;
use Tyondo\Email\Helpers\TyondoMailEnhance;

class EmailController extends Controller
{

    public $mail;
    public function __construct(TyondoMailEnhance $tyondoMailEnhance)
    {
        $this->mail = $tyondoMailEnhance;
    }

    public function index()
    {
      //  return json_encode($this->mailboxConnection->checkMailbox());

      $emails =  $this->mail->getMails();

      /*echo '<pre>';
      print_r($emails);
      echo '</pre>';
      exit;
      return $emails;*/
      return view(config('temail.views.pages.mail.index'), compact('emails'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email_id)
    {
      $email = $this->mail->getSingleMail($email_id);
      return view(config('temail.views.pages.mail.show'), compact('email'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
