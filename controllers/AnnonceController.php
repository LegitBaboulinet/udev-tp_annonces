<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 15:20
 */

include 'views/AnnonceView.php';


class AnnonceController
{
    private $view;

    public function __construct()
    {
        $this->view = new AnnonceView();
    }

    /**
     * displayNewAnnonce
     */
    public function displayNewAnnonce()
    {
        $this->view->displayNewAnnonce();
    }
}