<?php
/**
 * Created by PhpStorm.
 * User: eniams
 * Date: 27/12/17
 * Time: 13:26
 */

namespace App\Helper;

use App\Exception\FileEmptyException;
use App\Exception\NotCsvException;

class CheckCsvFile
{
    public function checkIfIsCsv($file)
    {
        $type = explode(".",$file);
        if(strtolower(end($type)) == 'csv') {
            throw new NotCsvException(sprintf("The %s is not a CSV file",$file));
        }
    }

    public function checkIfIsEmty($file)
    {
        if(empty($file)) {
            throw new FileEmptyException(sprintf("The %s is empty",$file));
        }
    }
}