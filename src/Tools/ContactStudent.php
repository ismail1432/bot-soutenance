<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 16:55
 */

namespace App\Tools;


use App\Service\ReadFile;

class ContactStudent
{
    protected $sendMail;

    protected $sessionCreator;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->sessionCreator = new SessionCreator();
        $this->sendMail = new SendMail($mailer);
    }

    public function contactStudent(ReadFile $file)
    {
        $datas = $file->getData();
        $from = "Smaïne";
        foreach ($datas as $item)
        {
            $destinataire = $item[0];
            $subject = $item[1];
            $avaibility = $item[2];
            $content = $this->sessionCreator->createSessionMessgae($from,$avaibility,$message);
            $this->sendMail->sendMail($subject, $content, $from, $destinataire);
        }
    }
}