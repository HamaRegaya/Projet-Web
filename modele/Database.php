<?php

class Database 
{
	private static $dbName 	   = 'CrudUtil';
	private static $dbHost 	   = 'localhost';
	private static $dbUsername = 'root';
	private static $dbPassword = '';

	private static $conn = null;

	public function __construct()
	{
		
	}

	public static function connexion()
	{
		
		if (null == self::$conn)
		{
			try
			{
				self::$conn =  new PDO( "mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbPassword); 
			} 
			catch(PDOException $e)
			{
				die($e->getMessage());
			}
		}
		return self::$conn;
	}

	public static function deconnexion()
	{
		self::$conn = null;
	}

}

?>
