<?php
/**
 * Created by PhpStorm.
 * User: Lucas
 * Date: 01-Dec-18
 * Time: 16:07
 */

class Connexion
{
    /**
     * @var PDO
     */
    private $db;

    /**
     * @var string
     */
    private $error;

    /**
     * Connexion constructor.
     * @param $db
     */
    public function __construct()
    {
        $dsn = 'mysql:dbname=tp_annonces_lucas_macori;host=127.0.0.1';
        $user = 'root';
        $password = '';

        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    /**
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }
}