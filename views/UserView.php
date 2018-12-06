<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02-Dec-18
 * Time: 14:12
 */

class UserView
{
    /**
     * UserView constructor.
     */
    public function __construct()
    {
    }

    public function displayNewUser()
    {
        $html = file_get_contents('views/templates/utilisateur/signup.html');
        echo $html;
    }

    public function displayLogin()
    {
        afficherTemplate('views/templates/utilisateur/login.html', []);
    }

    public function displayConfirmation()
    {
        $html = file_get_contents('views/templates/utilisateur/confirmation.html');
        echo $html;
    }

    public function displayErreurConnexion()
    {
        $html = '<div class="alert alert-danger">';
        $html .= '  Mauvais nom d\'utilisateur ou mot de passe';
        $html .= '</div>';

        $data_array = [];
        $data_array['message'] = $html;
        afficherTemplate('views/templates/utilisateur/login.html', $data_array);
    }

    /**
     * @param array $users
     */
    public function displayUsersAnnonces(array $users)
    {
        // Génération du HTML
        $html = '<ul class="list-group">';
        // Récupération des informations des utilisateurs
        foreach ($users as $user) {
            $html .= '<li class="list-group-item">' . $user->getLogin() . ' - ' . $user->getEmail() . '</li>';
        }
        $html .= '</div>';

        // Affichage du HTML
        $data_array = [];
        $data_array['utilisateurs'] = $html;
        afficherTemplate('views/templates/utilisateur/list.html', $data_array);
    }
}