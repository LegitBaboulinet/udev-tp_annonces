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
        $query = $this->db->prepare('INSERT INTO Annonce (title, content, author_id) VALUES (?, ?, ?)');

        // Exécution de la requête SQL
        $success = $query->execute(array($annonce->getTitle(), $annonce->getContent(), $annonce->getAuthorId()));

        // Vérification des résultats
        if ($success) {
            return true;
        }
        return false;
    }

    /**
     * @param bool $byLoggedUser
     * @param int $userId
     * @return array|null
     */
    public function charger($byLoggedUser = false, $userId = 0)
    {
        $annonces = [];

        // Vérification des paramètres
        $byLoggedUser = (is_bool($byLoggedUser)) ? $byLoggedUser : false;
        $userId = (is_numeric($userId)) ? $userId : 0;

        // Préparation de la requête SQL
        $sql = 'SELECT id, title, content, date FROM annonce WHERE 1=1 ';
        if ($byLoggedUser) {
            $sql .= ' AND author_id != ( SELECT ID FROM Utilisateur WHERE login = \'anonymous\' )';
        }
        if ($userId > 0) {
            $sql .= ' AND author_id = ?';
        }
        $query = $this->db->prepare($sql);

        // Liaison des paramètres
        if ($userId > 0) {
            $query->bindParam(1, $userId);
        }

        // Exécution de la requête SQL
        $success = $query->execute();

        if ($success) {
            // Liaison des résultats
            $query->bindColumn(1, $id);
            $query->bindColumn(2, $title);
            $query->bindColumn(3, $content);
            $query->bindColumn(4, $date);

            // Lecture des résultats
            while ($query->fetch()) {
                // Création de l'annonce
                $annonce = new Annonce();

                // Ajout des valeurs
                $annonce->getId($id);
                $annonce->setTitle($title);
                $annonce->setContent($content);
                $annonce->setDate($date);

                // Ajout de l'annonce à l'array des annonces
                $annonces[] = $annonce;
            }

            return $annonces;
        }
        return null;
    }
}