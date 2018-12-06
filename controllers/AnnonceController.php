<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 15:20
 */

include 'views/AnnonceView.php';
include 'models/AnnonceModel.php';


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

    public function displayAnnonces()
    {
        // Récupération des annonces
        $annonces = $this->model->charger();

        // Affichage des annonces
        if ($annonces != null) {
            $this->view->displayAnnonces($annonces);
        } else {
            $this->errorView->displayError();
        }
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
                    break;
                case 'id':
                    $annonce->setAuthorId((is_numeric($value)) ? $value : 1);
                    break;
            }
        }

        if ($annonce->getTitle() != null && $annonce->getContent() != null) {
            // Sauvegarde dans la base de données
            if ($this->model->sauvegarder($annonce)) {

                // Redirection vers la page principale
                header('Location: index.php');
                exit;
            } else {
                $this->errorView->displayError();
            }
        } else {
            $this->errorView->displayError();
        }
    }

    public function displayAnnoncesUtilisateur()
    {
        // Récupération des annonces
        $annonces = $this->model->charger(false, $_GET['utilisateur']);

        // Affichage des annonces
        if ($annonces != null) {
            $this->view->displayAnnonces($annonces);
        } else {
            $this->errorView->displayError();
        }
    }
}