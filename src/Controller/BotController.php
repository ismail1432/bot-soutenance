<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 27/12/2017
 * Time: 21:29
 */

namespace App\Controller;


use App\Service\ReadCsvFile;
use App\Tools\ContactStudent;
use App\Tools\SendMail;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BotController extends Controller
{
    /**
     * Matches /create
     *
     * @Route("/create", name="create")
     */
    public function contactStudentFromCsv(ReadCsvFile $readCsvFile, SendMail $mail, ContactStudent $contactStudent)
    {
        $path =__DIR__.'/../../import/';

        $file = 'soutenance.csv';
        $pathFile = $path.'/'.$file;
        $readFile = new ReadCsvFile();

        $readFile->setPathFile($pathFile);
        $contactStudent->contactStudent($readFile);
        return new Response("<body><h1>Good </h1></h></body>");
    }
}