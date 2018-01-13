<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 16:55
 */

namespace App\Tools;


use App\Service\ReadFile;

/**
 * Class ContactStudent
 * @package App\Tools
 */
class ContactStudent
{
    /**
     * @var SendMail Object
     */
    protected $sendMail;

    /**
     * @var SessionCreator
     */
    protected $sessionCreator;
    /**
     * @var string MESSAGE_AUTHOR from .env
     */
    protected $author;
    /**
     * @var string from .env MAIL_FROM from .env
     */
    protected $mailFrom;

    /**
     * ContactStudent constructor.
     * @param \Swift_Mailer $mailer
     * @param SessionCreator $sessionCreator
     * @param $author
     * @param $mailFrom
     */
    public function __construct(\Swift_Mailer $mailer, SessionCreator $sessionCreator, $author, $mailFrom)
    {
        $this->sessionCreator = $sessionCreator;
        $this->sendMail = new SendMail($mailer);
        $this->mailFrom = $mailFrom;
        $this->author = $author;
    }

    /**
     * @param ReadFile $file
     *
     * Send mails to students
     */
    public function contactStudent(ReadFile $file) :void
    {
        //retrieve data from file
        $datas = $file->getData();

        foreach ($datas as $item)
        {
            $destinataire = $item[0];
            $subject = $item[1];
            $avaibility = $item[2];

            //create the content message
            $content = $this->sessionCreator->createSoutenanceSessionMessage($this->author, $avaibility, $subject);

            //send the mail
           // $this->sendMail->sendMail($subject, $content, $this->mailFrom, $destinataire);
        }
        die;
    }
}