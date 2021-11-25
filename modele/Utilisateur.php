<?php

require_once 'UtilisateurDao.php';
require_once 'ValidationException.php';
require_once 'Database.php';

class Utilisateur extends UtilisateurDao
{

	private $UtilisateurDao = null;

	public function __construct()
	{
		$this->UtilisateurDao = new UtilisateurDao();
	}

	public function getAllUtilisateurs($order)
	{
		try
		{
			self::connexion();
			$result = $this->UtilisateurDao->selectAll($order);
			self::deconnexion();
			return $result;
		}
		catch(Exception $e)
		{	
			self::deconnexion();
			throw $e;
		}
	}

	public function getUtilisateur($id)
	{
		try
		{
			self::connexion();
			$result = $this->UtilisateurDao->selectById($id);
			self::deconnexion();
		}
		catch(Exception $e)
		{	
			self::deconnexion();
			throw $e;
		}
		return $this->UtilisateurDao->selectById($id);
	}
	private function validParams($email, $mdp)
	{
		$errors = array();

		
             
		if ( !isset($email) || empty($email) ) { 
		    $errors[] = "l' Email est requis"; 
		}
		
                if ( !isset($mdp) || empty($mdp) ) { 
		    $errors[] = 'Le mot de passe est requis'; 
		if (empty($errors))
		{
			return;
		}
		throw new ValidationException($errors);
	}


	}
	private function validerUtilisateurParams($nom, $prenom, $email, $telephone, $mdp)
	{
		$errors = array();

		if ( !isset($nom) || empty($nom) ) { 
		    $errors[] = 'Le nom est requis'; 
		}
                if ( !isset($prenom) || empty($prenom) ) { 
		    $errors[] = 'Le nom est requis'; 
		}
		if ( !isset($email) || empty($email) ) { 
		    $errors[] = "l' Email est requis"; 
		}
		if ( !isset($telephone) || empty($telephone) ) { 
		    $errors[] = 'Le téléphone est requis'; 
		}
                if ( !isset($mdp) || empty($mdp) ) { 
		    $errors[] = 'Le mot de passe est requis'; 
		if (empty($errors))
		{
			return;
		}
		throw new ValidationException($errors);
	}
        }
		public function logUtilisateur($email, $mdp)
{
	try 
	{
		self::connexion();
		$this->validParams($email, $mdp);
		$result = $this->UtilisateurDao->log($email, $mdp);
		self::deconnexion();
		return $result;
	}
	catch(Exception $e)
	{
		self::deconnexion();
		throw $e;

	}
	
}

	public function creeNouveauUtilisateur($nom, $prenom, $email, $telephone, $mdp)
	{
		try 
		{
			self::connexion();
			$this->validerUtilisateurParams($nom, $prenom, $email, $telephone, $mdp);
			$result = $this->UtilisateurDao->insert($nom, $prenom, $email, $telephone, $mdp);
			self::deconnexion();
			return $result;
		}
		catch(Exception $e)
		{
			self::deconnexion();
			throw $e;
		}
	}

	public function modifierUtilisateur($nom, $prenom, $email, $telephone, $mdp, $id)
	{
		try 
		{
			self::connexion();
			$result = $this->UtilisateurDao->modifier($nom, $prenom, $email, $telephone, $mdp, $id);
			self::deconnexion();
		}
		catch(Exception $e) {
			self::deconnexion();
			throw $e;
		}
	}
	public function supprimerUtilisateur($id)
	{
		try
		{
			self::connexion();
			$result = $this->UtilisateurDao->delete($id);
			self::deconnexion();
		}
		catch(Exception $e)
		{
			self::deconnexion();
			throw $e;
		}
	}

}

?>
