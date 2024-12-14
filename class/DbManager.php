<?php

namespace Database;

use \PDO;
use \PDOException;

class DbManager{

    private string $host;
    private string $name;
    private string $user;
    private string $password;

    public function __construct(string $host, string $name, string $user, string $password)
    {
        $this->host = $host;
        $this->name = $name;
        $this->user = $user;
        $this->password = $password;
    }

    function db_access(){
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8mb4";
            return $pdo = new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            echo "Connexion réussie à la base de données !";
        } catch (PDOException $e) {
            echo "Erreur de connexion : " . $e->getMessage();
        } 
    }
    
    function db_sql(string $sql){
        $pdo = $this->db_access();
        $query = $pdo->query($sql);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

}



