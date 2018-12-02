<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 15:57
 */

include 'models/classes/Annonce.php';


class AnnonceModel
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * AnnonceModel constructor.
     * @param $db PDO
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @param Annonce $annonce
     * @return bool
     */
    public function sauvegarder(Annonce $annonce)
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare('INSERT INTO Annonce (title, content) VALUES (?, ?)');

        // Exécution de la requête SQL
        $success = $query->execute(array($annonce->getTitle(), $annonce->getContent()));

        // Vérification des résultats
        if ($success) {
            return true;
        }
        return false;
    }
}