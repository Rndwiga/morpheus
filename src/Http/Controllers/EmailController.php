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
    public function indexAjax()
    {
      //  return json_encode($this->mailboxConnection->checkMailbox());

      $data =  [
          'emails' => $this->mail->getMails(),
          'mailbox_details' => $this->mail->aboutMailBox()
          /*
         * {"date":"Mon, 21 Aug 2017 20:23:03 +0300 (EAT)",
         * "driver":"imap",
         * "mailbox":"{gmail-imap.l.google.com:993\/imap\/notls\/ssl\/novalidate-cert\/user=\"raphndwi@gmail.com\"}INBOX","total_emails":30290,"recent_emails":0}
         * */
      ];

      return $data;
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
    public function testFn(){
        $details =  $this->mail->mailboxStatus();
        print_r($details);
        exit;

        return $details;
    }

}
