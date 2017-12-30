<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 27/12/2017
 * Time: 21:03
 */

namespace App\Service;


use Symfony\Component\Finder\Finder;

abstract class AbstractReadFile
{

    public function getFile($directory)
    {
        return file($directory);
    }

}