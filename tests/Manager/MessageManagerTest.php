<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 01/01/2018
 * Time: 16:02
 */


class MessageManagerTest extends \Symfony\Bundle\FrameworkBundle\Test\KernelTestCase
{

    public function testGetSoutenanceMessage()
    {
        $message = "Bonjour, <br><p>Je suis *AUTHOR*, je fais parti des mentors OpenClassrooms</p><br>
        <p>Dans le cadre de votre formation je vous contacte pour le passage de votre soutenance</p>
        <p>Si aucun créneau ne vous convient je vous laisse me communiquer vos préférences</p><p>Voici mes disponibiltés :</p>
        *AVAIBILITY*
        <p>A bientôt ! *AUTHOR*, mentor OpenClassrooms.</p>";

        $subject = "soutenance";

        $messageObject = new \App\Entity\Message();
        $messageObject->setSubject($subject);
        $messageObject->setContent($message);

        $messageRepo = $this->createMock(\App\Repository\MessageRepository::class);
        $messageRepo->expects($this->any())
            ->method('find')
            ->willReturn($messageObject);

        $objectManager = $this->createMock(\Doctrine\ORM\EntityManager::class);
        $messageManager = new \App\Manager\MessageManager($objectManager);

        $objectManager->expects($this->any())
            ->method('getRepository')
            ->willReturn($messageRepo);

        $messageEntityFromDdb = $messageManager->findMessageSoutenance();

        $this->assertEquals($messageObject, $messageEntityFromDdb);
    }
}