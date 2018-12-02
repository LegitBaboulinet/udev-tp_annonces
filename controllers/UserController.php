<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02-Dec-18
 * Time: 14:14
 */

include 'views/UserView.php';
include 'models/UserModel.php';


class UserController
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
        $this->view = new UserView();
        $this->model = new UserModel($db);
        $this->errorView = new ErrorView();
    }

    public function displayNewUser()
    {
        $this->view->displayNewUser();
    }

    public function newUser()
    {
        // Création de l'utilisateur
        $user = new Utilisateur();

        // Parcours des valeurs
        foreach ($_POST as $key => $value) {
            switch ($key) {
                case 'login':
                    $user->setLogin((is_string($value) ? $value : null));
                    break;
                case 'password':
                    $user->setPassword((is_string($value) ? $value : null));
                    break;
                case 'email':
                    $user->setEmail((filter_var($value, FILTER_VALIDATE_EMAIL)) ? $value : null);
                    break;
            }
        }

        if ($user->getLogin() != null && $user->getPassword() != null && $user->getEmail() != null) {
            // Sauvegarde dans la base de données
            if ($this->model->sauvegarder($user)) {
                // Création de la session
                $_SESSION['utilisateur'] = $user;

                // Redirection vers la page principale
                $this->view->displayConfirmation();
            } else {
                $this->errorView->displayError();
            }
        } else {
            $this->errorView->displayError();
        }
    }
}