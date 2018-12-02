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

    public function displayConfirmation()
    {
        $html = file_get_contents('views/templates/utilisateur/confirmation.html');
        echo $html;
    }
}