<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 16:38
 */

namespace App\Tools;


use App\Manager\MessageManager;
use App\Service\ReadFile;
use Doctrine\Common\Persistence\ObjectManager;

class SessionCreator
{
    protected $messageManager;

    public function __construct(MessageManager $messageManager)
    {
        $this->messageManager = $messageManager;
    }

    public function createSessionMessage($author, $avaibility, $message)
    {
        $message = str_replace('*AUTHOR*', $author, $message);
        return str_replace( '*AVAIBILITY*', $avaibility, $message);
    }

    public function getSoutenanceMessage()
    {
        return $this->messageManager->findMessageSoutenance();
    }

    public function createSoutenanceSessionMessage($author, $avaibility)
    {
        $message = $this->getSoutenanceMessage();

        return $this->createSessionMessage($author, $avaibility, $message->getContent());
    }

}