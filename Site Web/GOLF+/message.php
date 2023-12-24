<?php
// paramètres de la BDD
include("conf_bdd.php");

try 
{
	// connexion bdd
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$i=0;
	// requete sql 
	// chaque champ de données deviendra une cellule du tableau
	foreach($bdd->query('SELECT messages from message') as $row) 
	{
		echo $row[0];
	}
	$bdd = null;   // fermeture connexion
} 
catch (PDOException $e) 
{
	//traitement des erreurs
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>