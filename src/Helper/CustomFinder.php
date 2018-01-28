<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 07/01/2018
 * Time: 19:09
 */

namespace App\Helper;


use App\Exception\NoFileFoundException;
use Symfony\Component\Finder\Finder;

/**
 * Class CustomFinder
 * @package App\Helper
 */
class CustomFinder extends Finder
{

    /**
     * Return the first file name founded
     * @param $directory
     *
     * @return string
     */
    public function findFile($directory)
    {
       $files = $this->files()->in($directory)->exclude('contacted');

        if(count($files) === 0 ) {
            throw new NoFileFoundException(sprintf("No file found ! Please make sure that there almost one file in %s", $directory));
        }

       foreach ($files as $file) {
            return $file->getRelativePathname();
        }
    }
}