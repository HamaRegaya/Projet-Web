<?php
session_start();

if(isset($_SESSION["email"])&&($_SESSION["role"]==2)) {
}else{
  
	header('Location: login.php');

    
}

?>

<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Voir l'utilisateur</title>
		<meta charset="utf-8">
		<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script type="text/javascript" src="../bootstrap/js/jquery-3.1.1.js"></script>
	</head>
	
	<body>
		<div class="container">
			<div class="span10 offset 1">
				<div class="row">
					<h3><strong>Voir l'utilisateur</strong></h3>
				</div>

				<div class="form-horizontal">
                                    <div class="control-group">
						<label class="control-label">#</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $utilisateur->id; ?>
								</label>
							</div>
					</div>
					<div class="control-group">
						<label class="control-label">Nom:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $utilisateur->nom; ?>
								</label>
							</div>
					</div>
                                    <div class="control-group">
						<label class="control-label">Prénom:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $utilisateur->prenom; ?>
								</label>
							</div>
					</div>
                                    
					<div class="control-group">
						<label class="control-label">Email:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $utilisateur->email; ?>
								</label>
							</div>
					</div>

					<div class="control-group">
						<label class="control-label">Téléphone:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $utilisateur->telephone; ?>
								</label>
							</div>
                                        
                                        <div class="control-group">
						<label class="control-label">Mot De Passe:</label>
							<div class="controls">
								<label class="checkbox">
									<?php echo $utilisateur->mdp; ?>
								</label>
							</div>
                                                
					</div>
					<br>
					<div class="form-actions">
						<a class="btn btn-default" href="index.php">Back</a>
					</div>
			</div>
		</div>
	</body>
</html>