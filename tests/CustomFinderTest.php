<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 07/01/2018
 * Time: 18:57
 */

namespace Tests;

use App\Helper\CustomFinder;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CustomFinderTest extends WebTestCase
{
    public function testFindFile()
    {
        $customFindFile = new CustomFinder();

        $fileToFind = $customFindFile->findFile(__DIR__ . '/testsFileToFindDirectory');
        $file = 'fileToFind.csv';

        $this->assertEquals($file, $fileToFind);

    }
}