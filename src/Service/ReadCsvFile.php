<?php
/**
 * Created by PhpStorm.
 * User: eniams
 * Date: 27/12/17
 * Time: 13:22
 */

namespace App\Service;
use App\Helper\CheckCsvFile;

/**
 * Class ReadCsvFile
 * @package App\Service
 */
class ReadCsvFile implements ReadFile
{

    protected $pathFile;

    protected $checkFile;

    /**
     * ReadCsvFile constructor.
     *
     * create instance of Symfony\Component\Finder\Finder
     */
    public function __construct()
    {
        $this->checkFile = new CheckCsvFile();
    }

    /**
     * @param mixed $pathFile
     */
    public function setPathFile($pathFile)
    {
        $this->pathFile = $pathFile;
    }

    public function getPathFile()
    {
        if(!isset($file)){
            $file = $this->pathFile;
        }
        //Check if it's a CSV and if it's not empty
        $this->checkFile->checkCsv($file);

        //return the file content
        $file = file($file);
        return $file;

    }

    /**
     * Transform the data from csv to an array
     *
     * @return array
     */
    public function getData() :array
    {
        $file = $this->getPathFile($this->pathFile);
        $csvDatas = array_map('str_getcsv', $file);

        return $csvDatas;
    }


}