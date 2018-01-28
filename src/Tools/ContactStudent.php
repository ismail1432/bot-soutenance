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
    public function contactStudent(ReadFile $file): void
    {
        //retrieve data from file
        $datas = $file->getData();
        $subjectTmp = '';
        $avaibilityTmp = '';

        foreach ($datas as $item) {

            $destinataire = $item[0];

            //Retrieve subject
            $subject = !empty($item[1]) ? $item[1] : $subjectTmp;
            $subjectTmp = $subject;

            //Retrieve Link avaibility
            $avaibility = !empty($item[2]) ? $item[2] : $avaibilityTmp;
            $avaibilityTmp = $avaibility;

            //Create body message
            $content = $this->sessionCreator->createSoutenanceSessionMessage($this->author, $avaibility, $subject);


            //Send Mail
            $this->sendMail->sendMail($subject, $content, $this->mailFrom, $destinataire);

        }
    }

}