<?php

require_once('config/config.php');

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new PDO(
            "mysql:host=" . MYSQL_HOST .
            ";dbname=" . MYSQL_DB . ";charset=utf8",
            MYSQL_USER, MYSQL_PASS);

        $this->_deploy();
    }

    function crearConexion() {
      
        try {
            $pdo = $this->db;
        } catch (\Throwable $th) {
            die($th);
        }
        return $pdo;
    }
    
    private function _deploy()
    {
        $query = $this->db->query('SHOW TABLES');
        $tables = $query->fetchAll();
        if (count($tables) == 0) {
            $db_carbuy = file_get_contents('db/db_carbuy.sql');
            $this->db->query($db_carbuy);
        }
    }
}
