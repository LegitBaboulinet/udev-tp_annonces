<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30 Nov 2018
 * Time: 15:39
 */

include 'libs/Connexion.php';
include 'libs/view.php';
include 'views/ErrorView.php';
include 'controllers/AnnonceController.php';
include 'controllers/UserController.php';


// Démarrage de la sesson
session_start();

// Connexion à la base de données
$connexion = new Connexion();
$db = $connexion->getDb();

if ($db != null) {
    // Liaison des contrôleurs
    $annonceController = new AnnonceController($db);
    $userController = new UserController($db);

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'newannonce':
                $annonceController->displayNewAnnonce();
                break;
            case 'newuser':
                $userController->displayNewUser();
                break;
            case 'login':
                $userController->displayLogin();
                break;
            case 'userannonce':
                if (isset($_GET['utilisateur'])) {
                    $annonceController->displayAnnoncesUtilisateur();
                } else {
                    // TODO Afficher tous les utilisateurs ayant posté au moins une annonce
                }
                break;
        }
    } elseif (isset($_GET['action'])) {
        switch ($_GET['action']) {
            case 'newannonce':
                $annonceController->newAnnonce();
                break;
            case 'newuser':
                $userController->newUser();
                break;
            case 'login':
                $userController->login();
                break;
        }
    } else {
        $annonceController->displayAnnonces();
    }
} else {
    echo 'Erreur de connexion à la base de données : ' . $connexion->getError();
}