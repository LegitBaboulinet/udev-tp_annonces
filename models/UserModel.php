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
    public function sauvegarder(Utilisateur &$user)
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare('INSERT INTO utilisateur (login, password, email) VALUES (?, ?, ?)');

        // Exécution de la requête SQL
        $success = $query->execute(array($user->getLogin(), $user->getPassword(), $user->getEmail()));

        // Vérification des résultats
        if ($success) {
            $user->setId($this->db->lastInsertId());
            return true;
        }
        return false;
    }

    /**
     * @param Utilisateur $user
     * @return bool
     */
    public function estConnecte(Utilisateur &$user)
    {
        // Préparation de la requête SQL
        $query = $this->db->prepare('SELECT id, email FROM utilisateur WHERE login = ? AND password = ?');

        // Exécution de la requête SQL
        $success = $query->execute(array($user->getLogin(), $user->getPassword()));

        if ($success) {
            // Vérification de l'existence de l'utilisateur
            if ($query->rowCount() == 1) {
                $query->bindColumn(1, $id);
                $query->bindColumn(2, $email);
                $query->fetch();
                $user->setId($id);
                $user->setEmail($email);
                return true;
            }
            return false;
        }
        return false;
    }
}