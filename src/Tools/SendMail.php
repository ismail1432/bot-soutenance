<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 10:59
 */
namespace App\Tools;

class SendMail
{
    protected $mailer;

    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendMail()
    {
        $message = (new \Swift_Message('Hello Email'))
            ->setFrom('')
            ->setTo('')
            ->setBody(
               "<h1>It works !<h1>",
                'text/html'
            )
        ;

        $this->mailer->send($message);

    }
}