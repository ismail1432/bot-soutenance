<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 27/12/2017
 * Time: 21:29
 */

namespace App\Controller;


use App\Service\ReadCsvFile;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class BotController extends Controller
{
    /**
     * Matches /create
     *
     * @Route("/create", name="create")
     */
    public function contactStudentFromCsv(ReadCsvFile $readCsvFile)
    {
        die(var_dump($readCsvFile->getFile()));
    }
}