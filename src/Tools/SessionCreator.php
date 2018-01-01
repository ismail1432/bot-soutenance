<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 16:38
 */

namespace App\Tools;


use App\Service\ReadFile;

class SessionCreator
{
    public function createSessionMessage($author, $avaibility, $message)
    {
        $message = str_replace('*AUTHOR*', $author, $message);
        return str_replace( '*AVAIBILITY*', $avaibility, $message);
    }

    public function getSoutenanceMessage()
    {

    }

}