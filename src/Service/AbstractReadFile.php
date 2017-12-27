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
    private $finder;

    public function __construct()
    {
        $this->finder = new Finder();
    }

    public function getFile()
    {
        return $this->finder->files()->in(__DIR__);
    }

}