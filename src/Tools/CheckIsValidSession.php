<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 07/01/2018
 * Time: 19:41
 */

namespace App\Tools;


use App\Exception\WrongArgumentException;

class CheckIsValidSession
{
    public static function checkArguments($author, $link, $subject)
    {
        $tabArgs = ['subject'=> $subject, 'author'=> $author, 'availbility'=> $link];
        $allowedSubjects = ['session mentorat', 'session découverte', 'soutenance'];
        if(!in_array($tabArgs['subject'],$allowedSubjects)) {
            throw new WrongArgumentException(sprintf("Invalid %s argument", $tabArgs['subject']));
        }
        foreach ($tabArgs as $item => $value) {
            if(empty($value)|| (!is_string($value))) {
                throw new WrongArgumentException(sprintf("Invalid %s argument",$item));
            }
        }


    }
}