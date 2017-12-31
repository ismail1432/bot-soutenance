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

    public function sendMail($subject, $content, $from, $destinataire)
    {
        $message = (new \Swift_Message($subject))
            ->setFrom($from)
            ->setTo($destinataire)
            ->setBody(
               $content,
                'text/html'
            )
        ;

        $this->mailer->send($message);

    }
}