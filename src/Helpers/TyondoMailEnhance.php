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

    /***
     * This function fetches emails within a given limit and returns the latest emails received.
     * It can be improved to allow fetching of emails from the earliest
     * @param null $count
     * @param string $order
     * @return array
     */
    public function getMails($count = null, $order = 'new'){
       $uids = $this->mailboxConnection->searchMailbox();
       rsort($uids); //get the latest email ids
       if ($count){
           $this->limit = $count;
           $this->max = $this->limit > 0 ? $this->limit : $this->max;
       }
        $uids = array_splice($uids,0,$this->max);
       rsort($uids); //reorder appropriately
        $emailsOverview = $this->mailboxConnection->getMailsInfo($uids); //get array of all email ids
        krsort($emailsOverview); //Sort an associative array in descending order, according to the key
        return $emailsOverview;
    }

    /***
     * This functions fetches emails from certain days in the past to today
     * @param null $days
     * @return array
     */

    public function getEmailsWithin($days=null){

        // Find UIDs of messages within the past week
        $date = date ( "d M Y", strToTime ( "-1 days" ) );
        $emails=  $this->mailboxConnection->searchMailbox("SINCE \"$date\"");
        $emailsOverview = $this->mailboxConnection->getMailsInfo($emails); //get array of all email ids
        return $emailsOverview;
    }

    /***
     * This function fetches a single mail from the inbox based on it uid and marks it as read
     * @param $email_id
     * @return IncomingMail
     */

    public function getSingleMail($email_id)
    {
        //$email = $this->mailboxConnection->getMail($email_id, 0);
        $email = $this->mailboxConnection->getMail($email_id);
       // $this->mailboxConnection->markMailAsRead($email_id); //mark email as read
        return $email;
    }

    /***
     * Use this function when you want to know about the status of the mailbox. though its pretty useless as it is.
     * Enhance it to have, disk allocation, disk usage, mailbox status in the same call
     * @return array
     */

    public function aboutMailBox(){
        $details = $this->mailboxConnection->checkMailbox();
        return [
            'date' => $details->Date,
            'driver' => $details->Driver,
            'mailbox' => $details->Mailbox,
            'total_emails' => $details->Nmsgs,
            'recent_emails' => $details->Recent
        ];
    }

    public function mailboxStatus(){
        //return $this->mailboxConnection->statusMailbox(); //stdClass Object ( [flags] => 31 [messages] => 30299 [recent] => 0 [unseen] => 7036 [uidnext] => 63917 [uidvalidity] => 3 )
       // return $this->mailboxConnection->getListingFolders(); //returns empty arry on gmail
       // return $this->mailboxConnection->getMailboxInfo(); //runs indefinately
       // return $this->mailboxConnection->countMails(); //returns total  number of emails
        //return $this->human_filesize(($this->mailboxConnection->getQuotaLimit())*1024,3); //disk allocation
        return $this->human_filesize(($this->mailboxConnection->getQuotaUsage())*1024,3); //disk usage


    }

   private function human_filesize($bytes, $decimals = 2) {
        $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
    }

}
