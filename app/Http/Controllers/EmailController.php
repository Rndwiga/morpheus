<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $emails = $this->fetchMail();
      //  echo "<br />";
      //  echo "<pre>";
      //   print_r($emails);
      //   echo "</pre>";
      //  exit;
      return view('partials.index', compact('emails'));
    }
    public function fetchMail()
    {

            $mailbox = $this->emailDetails(); //inbox connection
              $emails = $mailbox->searchMailbox('ALL'); //get array of all email ids
            //  rsort($emails);
                $emailsOverview = $mailbox->getMailsInfo($emails); //get array of all email ids
                return $emailsOverview;
                /*
                [subject] => Your new Zerys account...
                [from] => no-reply@zerys.com
                [to] => raphael.williams.great@gmail.com
                [date] => 14 Oct 2016 12:32:38 -0400
                [message_id] =>
                [size] => 10989
                [uid] => 2
                [msgno] => 1
                [recent] => 0
                [flagged] => 0
                [answered] => 0
                [deleted] => 0
                [seen] => 1
                [draft] => 0
                [udate] => 1476462769
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
    private function emailDetails()
    {
      /*
          This function sets the connection details to be used for pulling emails
                $hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX'; //connecting to gmail
                $username = 'user@gmail.com';
                $password = '******';
        */
          $hostname = env('EMAIL_HOST');
          $username = env('EMAIL_USER');
          $password = env('EMAIL_PASSWORD');

          $attachDir = storage_path();
          $mailboxConnection = new ImapMailbox ($hostname, $username, $password, $attachDir); //new instance of mailbox
      return $mailboxConnection;
    }
    public function getSingleMail($email_id)
    {

      /*
        *This function fetches a single email from the inbox.
      */
          $mailbox = $this->emailDetails(); //inbox connection
          $email = $mailbox->getMail($email_id, 0);
            $mailbox->markMailAsRead($email_id); //mark email as read
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
    public function fetchSortedEmails()
    {
      /*
      * Include this as an alternive function in the library since it pulls sorted emails.i.e newest first.
      */
        //connecting to gmail.
        $hostname = env('EMAIL_HOST');
        $username = env('EMAIL_USER');
        $password = env('EMAIL_PASSWORD');
        //opening connection
            $inbox = imap_open($hostname,$username,$password)or die(imap_last_error()) or die('Cannot connect to Mail: ' . imap_last_error());
            //Getting Headers only
                $headers = imap_headers($inbox);
            /* grab emails */
            $emails = imap_search($inbox,'ALL');
                  /* put the newest emails on top */
                  rsort($emails);
                      foreach ($emails as $emailNumber) {
                        $overview = imap_fetch_overview($inbox,$emailNumber,0);
                        $emailSummary[] = array(
                              'emailStatus' => $overview[0]->seen ? 'read' : 'unread',
                              'from' => $overview[0]->from,
                              'subject' => $overview[0]->subject , //email subject
                              'sentOn' => date("M.j.Y g:i a", strtotime($overview[0]->date)), //formatted time e.g "M.j.Y g:i a" Nov.20.2016 10:10 am
                              'sentTo' => $overview[0]->to , //email to who
                              'emailSize' => $overview[0]->size , //email size
                              'messageNo' => $overview[0]->msgno ,
                              'isRecent' => $overview[0]->recent , //not sure
                              'isFlagged' => $overview[0]->flagged , //boolean 1 or 0
                              'isAnswered' => $overview[0]->answered , //boolean 1 or 0
                              'isDeleted' => $overview[0]->deleted , //boolean 1 or 0
                              'isDraft' => $overview[0]->draft , //boolean 1 or 0
                              'isUdate' => $overview[0]->udate , //boolean 1 or 0
                              'isUID' => $overview[0]->uid ,
                        );

                      }
                          /* close the connection */
                          imap_close($inbox);
                      return (object)$emailSummary;
    }
}
