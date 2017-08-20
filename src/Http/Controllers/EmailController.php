<?php

namespace Tyondo\Email\Http\Controllers;

use Illuminate\Http\Request;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

class EmailController extends Controller
{
    private $hostname;
    private $username;
    private $password;
    private $attachmentDir;
    private $mailboxConnection;

    public function __construct()
    {
        $this->hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX'; //connecting to gmail
        $this->username = config('temail.email_user');
        $this->password = config('temail.email_password');

        $this->attachmentDir = storage_path();
        $this->mailboxConnection = new ImapMailbox ($this->hostname, $this->username, $this->password, $this->attachmentDir); //new instance of mailbox
    }
    private function getEmailsWithin($days=null){

        // Find UIDs of messages within the past week
        $date = date ( "d M Y", strToTime ( "-1 days" ) );
        $emails=  $this->mailboxConnection->searchMailbox("SINCE \"$date\"");
        rsort($emails);
        $emailsOverview = $this->mailboxConnection->getMailsInfo($emails); //get array of all email ids

        return $emailsOverview;
    }

    public function index()
    {
      //  return json_encode($this->mailboxConnection->checkMailbox());

      $emails =  $this->getEmailsWithin();
      //return $emails;
      return view(config('temail.views.pages.mail.index'), compact('emails'));
    }
    public function fetchMail()
    {

            $mailbox = $this->emailDetails(); //inbox connection
        //return $mailbox->countMails();
              $emails = $mailbox->searchMailbox('ALL'); //get array of all email ids
            //  rsort($emails);
                $emailsOverview = $mailbox->getMailsInfo($emails); //get array of all email ids
                return $emailsOverview;
                /*
                [subject] => Introducing Weebly - Website Builder on ResellerClub!
                [from] => ResellerClub
                [to] => raphndwi@gmail.com
                [date] => Thu, 17 Aug 2017 20:56:12 +0000 (GMT)
                [message_id] => <542653397.1045881503003372868.JavaMail.obox-web@rcron.myorderbox.aus-tx.colo>
                [size] => 6610
                [uid] => 63806
                [msgno] => 30182
                [recent] => 0
                [flagged] => 0
                [answered] => 0
                [deleted] => 0
                [seen] => 0
                [draft] => 0
                [udate] => 1503004546
                */
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
      $email = $this->getSingleMail($email_id);
      return view('partials.show', compact('email'));

         echo "<br />";
        echo $email->date;
         echo "<br />";
        echo $email->fromName;
         echo "<br />";
        echo $email->fromAddress;
         echo "<br />";
         echo "<pre>";
          print_r($email->textHtml);
        echo "<br />";
          print_r($email->headers->sender['0']->mailbox);
        echo "<br />";
          print_r($email);
         echo "</pre>";
         exit;

      return view('partials.show', compact('emails'));
    }
    public function getSingleMail($email_id)
    {

      /*
        *This function fetches a single email from the inbox.
      */

          $email = $this->mailboxConnection->getMail($email_id, 0);
            $this->mailboxConnection->markMailAsRead($email_id); //mark email as read
          return $email;
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
