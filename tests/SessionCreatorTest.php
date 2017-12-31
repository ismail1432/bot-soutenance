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

    public function testCreateMessage()
    {
        //$this->assertInstanceOf(Session::class, $session);
    }
}