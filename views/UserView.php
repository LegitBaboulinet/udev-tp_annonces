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
}