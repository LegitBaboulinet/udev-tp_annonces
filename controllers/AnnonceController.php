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
    /**
     * @var AnnonceView
     */
    private $view;

    /**
     * AnnonceController constructor.
     */
    public function __construct()
    {
        $this->view = new AnnonceView();
    }

    public function displayNewAnnonce()
    {
        $this->view->displayNewAnnonce();
    }
}