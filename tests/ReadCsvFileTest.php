<?php
/**
 * Created by PhpStorm.
 * User: eniams
 * Date: 27/12/17
 * Time: 08:41
 */

namespace Tests\ReadCsvFileTest;

use App\Exception\FileEmptyException;
use App\Exception\NotCsvException;
use App\Helper\CheckCsvFile;
use App\Service\ReadCsvFile;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ReadCsvFileTest extends WebTestCase
{
    protected $checkCsvFile;
    protected $readCsvFile;

    protected function setUp()
    {
        $this->checkCsvFile = new CheckCsvFile();
    }

    public function testExceptionReadCsvFileWhenNotExists()
    {
        $pdf = "niceDocument.pdf";

        $this->expectException(NotCsvException::class);

        $this->checkCsvFile->checkIfIsCsv($pdf);
    }

    public function testExceptionReadCsvFilsWhenIsEmpty()
    {
        $file = file_get_contents(__DIR__ . '/testsfiledir/emptyFile.csv');

        $this->expectException(FileEmptyException::class);

        $this->checkCsvFile->checkIfIsEmty($file);
    }

    public function testReadCsvFileGetData()
    {
        $pathFile = __DIR__.'/testsfiledir/goodFile.csv';
        $this->readCsvFile = new ReadCsvFile($pathFile);
        $expected = $this->readCsvFile->getData();
        $datas =
            [
                ['contact@smaine.me','soutenance','02/02/2018','09:00','un long message'],
                ['test@gmail.com','session','12/02/2018','10:00','session decouverte'],
        ];

        $this->assertEquals($expected, $datas);
    }

}