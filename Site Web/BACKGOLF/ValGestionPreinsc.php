<?php

session_start();
$idf = $_POST['choix'];

	include("conf_bdd.php");
	try 
	{
		$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$prepare = $bdd->prepare('DELETE FROM inscriptions WHERE Idinsc="'.$idf.'" ');
		$prepare->execute();
		$bdd = null; 
		header('location:GestionPreinscription.php'); 
	}
	catch (PDOException $e) 
	{
		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	}
?>
