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
class ReadCsvFile extends AbstractReadFile implements ReadFile
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
     * @return mixed
     */
    public function getPathFile()
    {
        return $this->pathFile;
    }

    /**
     * @param mixed $pathFile
     */
    public function setPathFile($pathFile)
    {
        $this->pathFile = $pathFile;
    }

    public function getFile()
    {
        $file = $this->pathFile;
        //Check if it's a CSV and if it's not empty
        $this->checkFile->checkCsv($file);

        //return the file content
        $file = parent::getFile($file);
        return $file;

    }

    /**
     * Transform the data from csv to an array
     *
     * @return array
     */
    public function getData() :array
    {
        $file = $this->getFile($this->path);
        $csvDatas = array_map('str_getcsv', $file);

        return $csvDatas;
    }


}