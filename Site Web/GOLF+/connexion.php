<?php
// paramètres de la BDD
include("conf_bdd.php");

$login=$_POST['login'];
$mdp=$_POST['pwd'];
$grain='1%Yu9!#';
// $mdpc=sha1(sha1($mdp).$grain);


// gestion des exceptions
try 
{
	// connexion bdd
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// requete sql 
	foreach($bdd->query('SELECT email from utilisateurs
	where email="'.$login.'" and motdepasse="'.$mdp.'"') as $row) 
	{	
	
	}
	$bdd = null;   // fermeture connexion

	 if (isset($row[0]))

	 {
	 session_start();
		$_SESSION['email'] = $row[0];
		header('location:back.html');
	 }

		else header('location:index.html');

		
	
	
} 
catch (PDOException $e) 
{
	//traitement des erreurs
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>


