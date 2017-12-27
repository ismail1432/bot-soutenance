<?php
/**
 * Created by PhpStorm.
 * User: eniams
 * Date: 27/12/17
 * Time: 08:41
 */

namespace Tests\ReadCsvFileTest;

use App\Helper\CheckCsvFile;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReadCsvFileTest extends WebTestCase
{
    public function testReadCsvFileWhenExists()
    {

    }

    public function testReadCsvFileWhenNotExists()
    {

    }

    public function testReadCsvFileWhenEmpty()
    {
        $file = '';
        $checkCsv = new CheckCsvFile();

    }

    public function testReadCsvFileWhenWrongFormat()
    {

    }
}