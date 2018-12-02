<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 02-Dec-18
 * Time: 14:22
 */

include 'models/classes/Utilisateur.php';


class UserModel
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * UserModel constructor.
     * @param $db PDO
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function sauvegarder(Utilisateur $user)
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare('INSERT INTO utilisateur (login, password, email) VALUES (?, ?, ?)');

        // Exécution de la requête SQL
        $success = $query->execute(array($user->getLogin(), $user->getPassword(), $user->getEmail()));

        // Vérification des résultats
        if ($success) {
            return true;
        }
        return false;
    }
}