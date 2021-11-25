<?PHP
	include_once "./classes/dbh.class.php";
include_once "./classes/Usercontroller.php";
		

	class UserC {

		function addUser($user){
			$sql="INSERT INTO etudiant (firstname, lastname, email, username, password) 
			VALUES (:firstname,:lastname,:email,:username,:password)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
				$query->execute([
					'firstname' => $user->getFirstname(),
					'lastname' => $user->getLastname(),
					'email' => $user->getEmail(),
					'username' => $user->getUsername(),
					'password' => $user->getpassword()
					
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}	
			header('location:index.php');		
		}
		
		function displayUsers(){
			
			$sql="SELECT * FROM etudiant";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function deleteUser($id){
			$sql="DELETE FROM user WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function updateUser($user, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE user SET 
						firstname = :firstname, 
						lastname = :lastname,
						email = :email,
						username = :username,
						password = :password,
						pphone = :phone
					WHERE id = :id'
				);
				$query->execute([
					'firstname' => $user->getFirstname(),
					'lastname' => $user->getLastname(),
					'email' => $user->getEmail(),
					'username' => $user->getusername(),
					'password' => $user->getPassword(),
					'phone' => $user->getPhone(),
					'id' => $id
				]);
				echo $query->rowCount() . " records UPDATED successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recoverUserbyid($id){
			$sql="SELECT * from user where id=:id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['id'=>$id]);

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		//sans verification de mdp parceque le mot de passe est haché
		function loginUser($username){
			$sql="SELECT * from etudiant where username=:username OR email=:username";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute(['username'=>$username]);
				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
			header('location:registration.php');

		}
	function Mailcheck($email) : bool
	{ 
	  $check=true;
	  $sql="SELECT * from user where email=:email";
	  $db = config::getConnexion();
	  try{
		  $query=$db->prepare($sql);
		  $query->execute(['email'=>$email]);
		  $user=$query->fetch();
		  
		  
		  if($user)
		  {
			$check=false;
		  }
		  
		  return $check ;
	  }
	  catch (Exception $e){
		  die('Erreur: '.$e->getMessage());
	  }
	}
	  function Usernamecheck($username) : bool
	{ 
	  $check=true;
	  $sql="SELECT * from user where username=:username";
	  $db = config::getConnexion();
	  try{
		  $query=$db->prepare($sql);
		  $query->execute(['username'=>$username]);
		  $user=$query->fetch();
		  
		  
		  if($user)
		  {
			$check=false;
		  }
		  
		  return $check ;
	  }
	  catch (Exception $e){
		  die('Erreur: '.$e->getMessage());
	  }
  }
}


?>