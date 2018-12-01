<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 15:22
 */

class AnnonceView
{
    public function __construct()
    {

    }

    public function displayNewAnnonce()
    {
        $html = file_get_contents('views/templates/annonce/edit.html');
        echo $html;
    }
}