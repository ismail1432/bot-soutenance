<?php
/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 31/12/2017
 * Time: 08:55
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;

class AdminController
{
    public function index(Request $request, \Twig_Environment $twig)
    {
        return $twig->render('admin/index.html.twig');
    }
}