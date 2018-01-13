<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 16:38
 */

namespace App\Tools;


use App\Exception\WrongArgumentException;
use App\Manager\MessageManager;


/**
 * Class SessionCreator
 *
 * Create the session message
 *
 * @package App\Tools
 */
class SessionCreator
{
    protected $messageManager;

    public function __construct(MessageManager $messageManager)
    {
        $this->messageManager = $messageManager;
    }

    /**
     * @param $author
     * @param $avaibility
     * @param $message
     * @return mixed
     */
    public function createSessionMessage($author, $avaibility, $message)
    {
        //Replace the generic content with the author and the doodle link
        $message = str_replace('*AUTHOR*', $author, $message);
        return str_replace( '*AVAIBILITY*', $avaibility, $message);
    }

    /**
     * @param $subject
     * @return null|object
     */
    public function getSoutenanceMessage($subject)
    {
        //return the good message from subject
        return $this->messageManager->findMessageSession($subject);
    }

    /**
     * @param $author
     * @param $avaibility
     * @param $subject
     * @return mixed
     */
    public function createSoutenanceSessionMessage($author, $avaibility, $subject)
    {
        //check if arguments are not empty and string
        CheckIsValidSession::checkArguments($author, $avaibility, $subject);
        //Get the message from the object
        $message = $this->getSoutenanceMessage($subject);

        return $this->createSessionMessage($author, $avaibility, $message->getContent());
    }

}