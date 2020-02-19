<?php


class db
{
    private $connection;

    function __construct($host, $db,$user,$pass)
    {
        define('DB_DSN', "mysql:host=$host;dbname=$db;charset=utf8");
        define('DB_USER', $user);
        define('DB_PASS', $pass);
        try {
            $this->connection = new PDO(DB_DSN, DB_USER, DB_PASS);

        } catch (PDOException $e) {
            echo 'Error: '.$e->getMessage();
            die(); // Force execution to stop on errors.
        }
    }

    function query( $sql ) {
        return $this->connection->query($this->quote($sql));
    }

    function queryPrepared($template, $data){
        $statement =  $this->connection->prepare($template);

        $statement->execute($data);
        var_dump($statement->errorInfo());
    }
    function selectPrepared($template, $data){
        $sql = $template;
        $statement =  $this->connection->prepare($sql);

        var_dump($statement->errorInfo());
        $statement->execute($data);
        return $statement->fetchAll();
    }


    function quote($value){
        return $this->connection->quote($value);
    }
}
