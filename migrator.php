<?php

$migratObject = new Migrator();
$migratObject->create_database();
$migratObject->create_table();



class Migrator{

    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "loginsystem";
    private $charset = "utf8mb4";
    private $port = "3306";

    public  function create_database(){
        $sql = "CREATE DATABASE loginsystem";
        try {
            $dsn = "mysql:host=".$this->servername.";port=".$this->port.";charset=".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $pdo->exec($sql);
            echo "Database created successfully<br>";
    
        }
        catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        $pdo = null;
    }
    public  function create_table(){
        $sql = "CREATE TABLE IF NOT EXISTS users (
            idUsers int(11) NOT NULL AUTO_INCREMENT,
            username tinytext NOT NULL,
            age int(4) NOT NULL,
            userPass longtext NOT NULL,
            PRIMARY KEY (idUsers)
          )";
              try {
                $dsn = "mysql:host=".$this->servername.";port=".$this->port.";dbname=".$this->dbname.";charset=".$this->charset;
                $pdo = new PDO($dsn, $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
                $pdo->exec($sql);
                echo "My table created successfully<br>";
        
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
    
            $pdo = null;


    }

}
?>