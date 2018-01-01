<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 01/01/2018
 * Time: 16:08
 */

namespace App\Manager;

use App\Entity\Message;
use Doctrine\ORM\EntityManagerInterface;

class MessageManager
{
    protected $manager;

    /**
     * MessageManager constructor.
     * @param $manager
     */
    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }

    public function findMessageSoutenance()
    {
        return $this->manager->getRepository(Message::class)->findOneBy(['subject'=>'soutenance']);
    }


}