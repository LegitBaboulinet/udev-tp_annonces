<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02-Dec-18
 * Time: 13:32
 */

//include 'views/ErrorView.php';


//$errorView = new ErrorView();

function afficherTemplate($template, $data_array)
{
    if (file_exists($template)) {
        // Récupération du template
        $html = file_get_contents($template);
        $index_actuel = 0;

        while (strpos(substr($html, $index_actuel), "{{") !== false) {
            // Identification d'une variable
            $index_begin = strpos(substr($html, $index_actuel), "{{") + $index_actuel;
            $index_end = strpos(substr($html, $index_begin), "}}") + $index_begin;

            // Découpage de la variable
            $variable = trim(substr($html, $index_begin + 2, $index_end - $index_begin - 2));

            // Découpage du HTML autour de la variable
            $begin = substr($html, 0, $index_begin);
            $end = substr($html, $index_end + 2);

            /// Recherche de la valeur dans l'array des valeurs
            $value = (array_key_exists($variable, $data_array)) ? $data_array[$variable] : "";

            // Insertion de la valeur dans le template
            $html = $begin . $value . $end;

            // Enregistrement du nouvel index
            $index_actuel = $index_begin;
        }

        // Affichage du HTML
        echo $html;
    } else {
        // Affichage d'une erreur
        //$errorView->displayError();
        echo 'erreur';
    }
}