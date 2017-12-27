<?php
/**
 * Created by PhpStorm.
 * User: eniams
 * Date: 27/12/17
 * Time: 13:22
 */

namespace App\Service;

/**
 * Class ReadCsvFile
 * @package App\Service
 */
class ReadCsvFile extends AbstractReadFile implements ReadFile
{
    /**
     * ReadCsvFile constructor.
     *
     * create instance of Symfony\Component\Finder\Finder
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Transform the data from csv to an array
     *
     * @return array
     */
    public function getData() :array
    {

    }
}