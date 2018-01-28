<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 27/01/2018
 * Time: 08:55
 */

namespace App\Helper;


class MoveFile
{
    public static function createNameFile($fileName)
    {
        $fileName = substr($fileName, strpos($fileName, '/') );
        $date = new \DateTime();
        return $date->format('d-m-Y').'_'.$fileName;
    }

    public function moveFile($from, $file, $to)
    {
        $file = self::createNameFile($file);
        rename($from, $to.'/contacted/'.$file);
    }
}