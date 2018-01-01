<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 16:39
 */

namespace Tests\ReadCsvFileTest;

use App\Entity\Session;
use App\Tools\SessionCreator;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class SessionCreatorTest  extends WebTestCase
{
    public function setUp()
    {
       $this->messageCreator = new SessionCreator();
    }

    public function testCreateSessionMessage()
    {
        $content = "Bonjour, <br><p>Je suis *AUTHOR*, je fais parti des mentors OpenClassrooms</p><br>
        <p>Dans le cadre de votre formation je vous contacte pour le passage de votre soutenance</p>
        <p>Si aucun créneau ne vous convient je vous laisse me communiquer vos préférences</p><p>Voici mes disponibiltés :</p>
        *AVAIBILITY*
        <p>A bientôt ! *AUTHOR*, mentor OpenClassrooms.</p>";

        $author = "Smaïne";
        $availbility = "https://doodle.com/poll/qq7rzsyma2tzxm7q";
        $content = $this->messageCreator->createSessionMessage($author, $availbility, $content);
        $this->assertContains($author,$content);
        $this->assertContains($availbility,$content);
    }
}