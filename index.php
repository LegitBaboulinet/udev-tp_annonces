<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30 Nov 2018
 * Time: 15:39
 */

include 'libs/Connexion.php';
include 'controllers/AnnonceController.php';

// Connexion à la base de données
$connexion = new Connexion();
$db = $connexion->getDb();

if ($db != null) {
    // Liaison des contrôleurs
    $annonceController = new AnnonceController($db);

    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'newannonce':
                $annonceController->displayNewAnnonce();
                break;
            case 'newuser':
                // TODO Gérer la création d'un nouvel utilisateur
                break;
            case 'login':
                // TODO Gérer la connexion d'un utilisateur
                break;
            case 'userannonce':
                if (isset($_GET['utilisateur'])) {
                    // TODO Afficher les annonces de l'utilisateur donné en paramètre
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
        }
    } else {
        $annonceController->displayAnnonces();
    }
} else {
    echo 'Erreur de connexion à la base de données : ' . $connexion->getError();
}