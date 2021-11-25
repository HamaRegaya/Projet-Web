
<?php
session_start();

if(isset($_SESSION["email"])) {
}else{
  
	header('Location: login.php');

    
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>LOG IN SUCCES</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="main.js"> </script>
  WELCOME  <?php echo $_SESSION["nom"] ?>
<body>