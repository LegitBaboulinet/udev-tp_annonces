<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 15:22
 */


class AnnonceView
{
    /**
     * AnnonceView constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param array $annonces
     */
    public function displayAnnonces(array $annonces)
    {
        $data_array = [];
        $html = '';

        // Récupération de l'utilisateur connecté
        $login = 'anonymous';
        if (isset($_SESSION['utilisateur'])) {
            $login = $_SESSION['utilisateur']->getLogin();
        }

        // Génération du HTML
        foreach ($annonces as $annonce) {
            $html .= '<div class="container">';
            $html .= '    <h3>' . $annonce->getTitle() . ' </h3>';
            $html .= '    <p>' . $annonce->getContent() . '</p>';
            $html .= '    <footer class="blockquote-footer text-right">' . $annonce->getDate() . '</footer>';
            $html .= '</div>';
        }

        // Ajout du HTML dans l'array
        $data_array['list'] = $html;
        $data_array['login'] = $login;

        // Affichage du html dans le template des annonces
        afficherTemplate('views/templates/annonce/list.html', $data_array);
    }

    public function displayNewAnnonce()
    {
        $html = file_get_contents('views/templates/annonce/edit.html');
        echo $html;
    }
}