<?php
session_start();
include("conf_bdd.php");

//$photo = $_POST['photo'];
//$photo = 'avatar.png';
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$mail = $_POST['mail'];
//$mdp = $_POST['mdp'];
$competition = $_POST['competition'];

	try {
		$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, 
		PDO::ERRMODE_EXCEPTION);
		
		
		
		$prepare = $bdd->prepare("INSERT INTO golfeur (nom, prenom, mail,  competition) VALUES (:nom, :prenom, :mail,  :competition )");
		$prepare->bindParam(':nom', $nom);
		$prepare->bindParam(':prenom', $prenom);
		$prepare->bindParam(':mail', $mail);
		$prepare->bindParam(':competition', $competition);
		//$prepare->bindParam(':photo', $photo);
		//$prepare->bindParam(':idform', $idform);  // idformation pour clé secondaire
		$prepare->execute();
		$bdd = null; 
		header('location:GestionApprenants.php');
		}
		catch(PDOException $erreur)
		{
			echo $erreur.' --  '. $erreur->getMessage();
		}
?>