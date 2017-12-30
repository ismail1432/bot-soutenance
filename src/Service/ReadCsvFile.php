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
    public function __construct($pathFile)
    {
        $this->path = $pathFile;
        $this->checkFile = new CheckCsvFile();
    }

    public function getFile($directory)
    {
        //Check if it's a CSV and if it's not empty
        $this->checkFile->checkCsv($directory);

        //return the file content
        $file = parent::getFile($directory);
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