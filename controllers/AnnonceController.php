<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 15:20
 */

include 'views/AnnonceView.php';
include 'models/AnnonceModel.php';
include 'views/ErrorView.php';


class AnnonceController
{
    /**
     * @var AnnonceView
     */
    private $view;

    /**
     * @var AnnonceModel
     */
    private $model;

    /**
     * @var ErrorView
     */
    private $errorView;

    /**
     * AnnonceController constructor.
     * @param $db PDO
     */
    public function __construct($db)
    {
        $this->view = new AnnonceView();
        $this->model = new AnnonceModel($db);
        $this->errorView = new ErrorView();
    }

    public function displayNewAnnonce()
    {
        $this->view->displayNewAnnonce();
    }

    public function newAnnonce()
    {
        // Création de l'annonce
        $annonce = new Annonce();

        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'title':
                    $annonce->setTitle((is_string($value)) ? $value : null);
                    break;
                case 'content':
                    $annonce->setContent((is_string($value)) ? $value : null);
            }
        }

        if ($annonce->getTitle() != null && $annonce->getContent()) {
            // Sauvegarde dans la base de données
            if ($this->model->sauvegarder($annonce)) {
                // TODO Afficher la page principale
            } else {
                $this->errorView->displayError();
            }
        } else {
            $this->errorView->displayError();
        }
    }
}