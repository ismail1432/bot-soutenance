<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 09:01
 */

namespace App\DataFixtures;


use App\Entity\Message;
use App\Entity\Session;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MessageFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $msgSoutenance = new Message();
        $msgSoutenance->setContent($this->getMessageSoutenance());
        $msgSoutenance->setSubject("soutenance");

        $manager->persist($msgSoutenance);

        $msgFirstSession = new Message();
        $msgFirstSession->setContent($this->getMessageFirstSession());
        $msgFirstSession->setSubject("session");

        $manager->persist($msgFirstSession);
        $manager->flush();
    }

    public function getMessageSoutenance()
    {
        return "Bonjour, <br><p>Je suis *AUTHOR*, je fais parti des mentors OpenClassrooms</p><br>
        <p>Dans le cadre de votre formation je vous contacte pour le passage de votre soutenance</p>
        <p>Si aucun créneau ne vous convient je vous laisse me communiquer vos préférences</p><p>Voici mes disponibiltés :</p>
        *AVAIBILITY*
        <p>A bientôt ! *AUTHOR*,</p>
         <p>Mentor @OpenClassrooms,<br>
         Software developer @GreenFlex.</p>";


    }
    public function getMessageFirstSession()
    {
        return "<p>Bonjour, <br>Je suis  *AUTHOR*, je fais partie des mentors d’OpenClassrooms. Je te contacte pour fixer un premier rendez-vous en visioconférence avec toi afin de faire connaissance.</p>
                <p>Voici mes disponibilités, qu’est-ce que tu préfères : ?</p>
                *AVAIBILITY*
                <p>Je t’invite à me confirmer ta disponibilité 24h avant la date du rendez-vous pour que je puisse avoir le temps de prendre connaissance de ta réponse et m’organiser. Si aucune de ces dates ne te convient, je t’invite à me proposer une autre date.
                Ce premier rendez-vous « découverte » nous permettra d’échanger et j’en profiterai aussi pour t’expliquer le fonctionnement du mentorat sur OpenClassrooms et répondre aux questions que tu te poses à ce sujet.</p>
                <p>A bientôt ! *AUTHOR*, mentor OpenClassrooms.</p>";
    }
}