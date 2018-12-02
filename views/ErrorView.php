<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02-Dec-18
 * Time: 1:25
 */

class ErrorView
{
    /**
     * AnnonceView constructor.
     */
    public function __construct()
    {
    }

    public function displayError()
    {
        $html = file_get_contents('views/templates/error.html');
        echo $html;
    }
}