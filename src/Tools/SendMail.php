<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 10:59
 */
namespace App\Tools;

/**
 * Class SendMail
 *
 * Use Swiftmailer to send mail
 *
 * @package App\Tools
 */
class SendMail
{
    protected $mailer;

    /**
     * SendMail constructor.
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param $subject
     * @param $content
     * @param $from
     * @param $destinataire
     */
    public function sendMail($subject, $content, $from, $destinataire) :void
    {
        $message = (new \Swift_Message(ucfirst($subject)))
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