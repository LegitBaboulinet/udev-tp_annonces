<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 30 Nov 2018
 * Time: 15:39
 */

include 'controllers/AnnonceController.php';

$annonceController = new AnnonceController();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'newannonce':
            $annonceController->displayNewAnnonce();
            break;
    }
}