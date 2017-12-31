<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 27/12/2017
 * Time: 21:29
 */

namespace App\Controller;


use App\Service\ReadCsvFile;
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
    public function contactStudentFromCsv(ReadCsvFile $readCsvFile, SendMail $mail)
    {
        $mail->sendMail();
        return new Response("<body><h1>Good </h1></h></body>");
    }
}