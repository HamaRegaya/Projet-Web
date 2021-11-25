<?php
require 'Database.php';

class UtilisateurDao extends Database
{

	public function selectAll($order)
	{
		if (!isset($order))
		{
			$order = 'nom';
		}
		$pdo = Database::connexion($order);
		$sql = $pdo->prepare("SELECT * FROM utilisateur ORDER BY $order ASC");
		$sql->execute();
		

		$utilisateurs = array();
		while ($obj = $sql->fetch(PDO::FETCH_OBJ))
		{
			$utilisateurs[] = $obj;
		}
		return $utilisateurs;
	}

	public function selectById($id)
	{
		$pdo = Database::connexion();
		$sql = $pdo->prepare("SELECT * FROM utilisateur WHERE id = ?");
		$sql->bindValue(1, $id);
		$sql->execute();
		$result = $sql->fetch(PDO::FETCH_OBJ);
		return $result;
	}

	public function log($email, $mdp)
{
	session_start();
   
     

        $con = mysqli_connect("localhost", "root", "", "crudutil");

        if (!$con) {
            die("Connexion non reussite: " . mysqli_connect_error());
        }

        $query = "SELECT * FROM utilisateur WHERE email = '" . $email . "';" ; //cela est dangereux (SQL Injection Attack)
        
        $res = mysqli_query($con, $query);

        

        if (mysqli_num_rows($res) > 0) {
            while($user = mysqli_fetch_assoc($res)) {
                if($mdp != $user["mdp"]) {
                    echo "Mot de passe ou login incorrecte!";
                }
                else {
                    $_SESSION["user_id"] = $user["iduser"];
					$_SESSION["nom"] = $user["nom"];
					$_SESSION["prenom"] = $user["prenom"];
					$_SESSION["telephone"] = $user["telephone"];
					$_SESSION["email1"] = $user["email"];
                   
                   if ($user["role"]==1)
				   {
					$_SESSION["email"] = $user["role"];
                    header("Location: index.php");

				   }
				   else
				   {
					$_SESSION["email"] = $user["role"];
                    header("Location: html.php");

				   }
                }
            }
        } else {
            echo "Mot de passe ou login incorrecte!";
			echo "<script type='text/javascript'>alert('Mot de passe ou login incorrecte!');</script>";

        }

        mysqli_close($con);

    
		
	} 
	




	public function insert($nom, $prenom, $email, $telephone, $mdp)
	{
		$pdo = Database::connexion();
		$sql = $pdo->prepare("INSERT INTO utilisateur (nom, prenom, email, telephone, mdp) VALUES(?, ?, ?, ?, ?)");		
		$result = $sql->execute(array($nom, $prenom, $email, $telephone, $mdp));
	}

	public function modifier($nom, $prenom, $email, $telephone, $mdp, $id)
	{
		$pdo = Database::connexion();
		$sql = $pdo->prepare("UPDATE utilisateur SET nom = ?, prenom = ?, email = ?, telephone = ?, mdp = ? WHERE id = ? LIMIT 1");
		$result = $sql->execute(array($nom, $prenom, $email, $telephone, $mdp, $id));
	}

	public function delete($id)
	{
		$pdo = Database::connexion();
		$sql = $pdo->prepare("DELETE FROM utilisateur WHERE id =?");
		$sql->execute(array($id));
	}

}

?>
