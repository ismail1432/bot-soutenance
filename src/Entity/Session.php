<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SessionRepository")
 */
class Session
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     */
    private $message;

    /**
     * @var string
     */
    private $mail;

    /**
     * @var \DateTime
     */
    private $dateSession;

    /**
     * @var \DateTime
     */
    private $timeSession;

    /**
     * @var string
     */
    private $linkCalendar;

    /**
     * @var string
     */
    private $subject;

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * @param mixed $mail
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    }

    /**
     * @return mixed
     */
    public function getDateSession()
    {
        return $this->dateSession;
    }

    /**
     * @param mixed $dateSession
     */
    public function setDateSession($dateSession)
    {
        $this->dateSession = $dateSession;
    }

    /**
     * @return mixed
     */
    public function getTimeSession()
    {
        return $this->timeSession;
    }

    /**
     * @param mixed $timeSession
     */
    public function setTimeSession($timeSession)
    {
        $this->timeSession = $timeSession;
    }

    /**
     * @return mixed
     */
    public function getLinkCalendar()
    {
        return $this->linkCalendar;
    }

    /**
     * @param mixed $linkCalendar
     */
    public function setLinkCalendar($linkCalendar)
    {
        $this->linkCalendar = $linkCalendar;
    }

    /**
     * @return mixed
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param mixed $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

}
