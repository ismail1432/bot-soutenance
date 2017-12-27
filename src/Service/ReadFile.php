<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 27/12/2017
 * Time: 20:56
 */

namespace App\Service;


/**
 * Interface ReadFile
 * @package App\Service
 */
interface ReadFile
{
    /**This method should return an array of datas
     *
     * @return array
     */
    public function getData() :array ;
}