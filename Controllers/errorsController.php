<?php
/**
 * Created by PhpStorm.
 * User: Lexz
 * Date: 26.05.2019
 * Time: 14:31
 */

class errorsController extends Controller
{
    function index()
    {
        $this->render("404");
    }
}