<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/PhpCrudMvc/modele/Autoloader.php';
require_once ROOT_PATH . '/modele/Utilisateur.php';

class Controlleur 
{

	private $utilisateur = null;

	public function __construct()
	{
		$this->utilisateur = new Utilisateur();
	}

	public function redirect($location)
	{
		header('Location: ' . $location);
	}

	public function handleRequest()
	{
		$op = isset($_GET['op']) ? $_GET['op'] : null;

		try 
		{
			if (!$op || $op == 'list')
			{
				$this->listeUtilisateurs();
			}
				elseif ($op == 'nouveau')
				{
					$this->sauvegarderUtilisateur();
				}
				elseif ($op == 'login')
				{
					$this->loginUtilisateur();
				}
				elseif ($op == 'modifier')
				{
					$this->modifierUtilisateur();
				}
				elseif ($op == 'supprimer')
				{
					$this->supprimerUtilisateur();
				}
				else 
				{
					$this->showError("Page not found", "Page for execution" . $op . " was not found");
				}
		}
		catch(Exception $e)
		{
			$this->showError("Application errror", $e->getMessage());
		}
	}	

	public function listeUtilisateurs()
	{
		$orderby = isset($_GET['orderby']) ? $_GET['orderby'] : null;
		$utilisateurs = $this->utilisateur->getAllUtilisateurs($orderby);
		include ROOT_PATH . 'vue/utilisateurs.php';
	}
	public function loginUtilisateur()
	{
		$title = 'login';
		if (isset($_POST['form-submitted']))
		{
			$email  = isset($_POST['email'])  ? trim($_POST['email'])  : null;
                        $mdp   = isset($_POST['mdp'])   ? trim($_POST['mdp'])   : null;

			try
			{
				$this->utilisateur->logUtilisateur($email, $mdp);
				return;
			}
			catch(ValidationException $e)
			{
				$errors = $e->getErrors();
				echo "<script type='text/javascript'>alert('merci de remplir les champs !');</script>";
				
			}
		}
		include ROOT_PATH . 'login.php';

	}
	public function sauvegarderUtilisateur()
	{
		$title = 'Créer un nouvel utilisateur';

		$nom 	= '';
                $prenom	= '';
		$email  = '';
		$telephone = '';
                $mdp = '';

		$errors = array();

		if (isset($_POST['form-submitted']))
		{
			$nom   = isset($_POST['nom'])   ? trim($_POST['nom'])   : null;
                        $prenom   = isset($_POST['prenom'])   ? trim($_POST['prenom'])   : null;
			$email  = isset($_POST['email'])  ? trim($_POST['email'])  : null;
			$telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : null;
                        $mdp   = isset($_POST['mdp'])   ? trim($_POST['mdp'])   : null;

			try
			{
				$this->utilisateur->creeNouveauUtilisateur($nom, $prenom, $email, $telephone, $mdp);
				$this->redirect('index.php');
				return;
			}
			catch(ValidationException $e)
			{
				$errors = $e->getErrors();
			}
		}
		
		include ROOT_PATH . '/vue/create.php';
	}

	public function modifierUtilisateur()
	{
		$title = 'Modifier un Utilisateur';

		$nom 	= '';
                $prenom	= '';
		$email  = '';
		$telephone = '';
                $mdp = '';
		$id = $_GET['id'];

		$utilisateur = $this->utilisateur->getUtilisateur($id);

		$errors = array();

		if (isset($_POST['form-submitted'])) 
		{
			$nom   = isset($_POST['nom'])   ? trim($_POST['nom'])   : null;
                        $prenom   = isset($_POST['prenom'])   ? trim($_POST['prenom'])   : null;
			$email  = isset($_POST['email'])  ? trim($_POST['email'])  : null;
			$telephone = isset($_POST['telephone']) ? trim($_POST['telephone']) : null;
                        $mdp   = isset($_POST['mdp'])   ? trim($_POST['mdp'])   : null;
			
			try 
			{
				$this->utilisateur->modifierUtilisateur($nom, $prenom, $email, $telephone, $mdp, $id);
				$this->redirect('index.php');
				return;
			}
			catch(ValidationException $e)
			{
				$errors = $e->getErrors();
			}
		}
		include ROOT_PATH . 'vue/update.php';
	}

	public function supprimerUtilisateur()
	{

//		$id = isset($_GET['id']) ? $_GET['id'] : null;
                $id = $_GET['id'];
		
		if (!isset($_POST['submit']))
		{
			$this->utilisateur->supprimerUtilisateur($id);

			$this->redirect('index.php');
		}

		if (!$id)
		{
			throw new Exception('Internal error');
		}
		$utilisateur = $this->utilisateur->getUtilisateur($id);
		
	

	}

	

	public function showError($title, $message)
	{
		include ROOT_PATH . 'vue/error.php';
	}
}

?>
