<?php 



 class config {
    private static $pdo = NULL;

    public static function getConnexion() {
      if (!isset(self::$pdo)) {
		try{
        self::$pdo = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
	     	self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$pdo;
    }
  }