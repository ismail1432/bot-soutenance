<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 16:55
 */

namespace App\Tools;


use App\Manager\MessageManager;
use App\Service\ReadFile;

class ContactStudent
{
    protected $sendMail;

    protected $sessionCreator;

    public function __construct(\Swift_Mailer $mailer, SessionCreator $sessionCreator)
    {
        $this->sessionCreator = $sessionCreator;
        $this->sendMail = new SendMail($mailer);
    }

    public function contactStudent(ReadFile $file)
    {
        //To Do Get data from .env
        $datas = $file->getData();
        $author = "";
        $from = "";
        $subject = "Soutenance";

        foreach ($datas as $item)
        {
            $destinataire = $item[0];
            $avaibility = $datas[0][2];
            $content = $this->sessionCreator->createSoutenanceSessionMessage($author, $avaibility);
            $this->sendMail->sendMail($subject, $content, $from, $destinataire);
        }
    }
}