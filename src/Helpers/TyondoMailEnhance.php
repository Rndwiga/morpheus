<?php
/*
* This library contain, registration and activation functions.
* The main purpose is to generate activation token, send activation email, and activate the user
* Output: boolean
*/
namespace Tyondo\Email\Helpers;

use Carbon\Carbon;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;

class TyondoMailEnhance
{
    private $hostname;
    /**
     * Limit returned results
     *
     * @var int
     */
    protected $limit = 0;
    /**
     * Default max to limit returned emails
     *
     * @var int
     */
    public  $max = 100;
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
    public function getMails($count = null, $order = 'new'){
       $uids = $this->mailboxConnection->searchMailbox();
       rsort($uids);
       //$uids = $this->mailboxConnection->sortMails();
       if ($count){
           $this->limit = $count;
           $this->max = $this->limit > 0 ? $this->limit : $this->max;
       }
        $uids = array_splice($uids,0,$this->max);
        $emailsOverview = $this->mailboxConnection->getMailsInfo($uids); //get array of all email ids
        krsort($emailsOverview); //Sort an associative array in descending order, according to the key
        return $emailsOverview;
    }

    public function getEmailsWithin($days=null){

        // Find UIDs of messages within the past week
        $date = date ( "d M Y", strToTime ( "-1 days" ) );
        $emails=  $this->mailboxConnection->searchMailbox("SINCE \"$date\"");
        $emailsOverview = $this->mailboxConnection->getMailsInfo($emails); //get array of all email ids
        return $emailsOverview;
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

}
