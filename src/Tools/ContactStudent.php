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
        $from = "Smaine";
        foreach ($datas as $item)
        {
            $destinataire = $item[0];
            $subject = $item[1];
            $content = $this->sessionCreator->createSession($item[2],$item[3]);
            $this->sendMail->sendMail($subject, $content, $from, $destinataire);
        }
    }
}