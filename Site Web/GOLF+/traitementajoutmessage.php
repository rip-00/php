<?php
// paramètres de la BDD
include("conf_bdd.php");

// récupération des données
$nom = $_POST['Nom'];
$prenom = $_POST['Prenom'];
$email = $_POST['email'];
$mdp = $_POST['mdp'];
$competition = $_POST['competition'];
$grain='1%Yu9!#';
$mdpc=sha1(sha1($mdp).$grain);


// Insertion de ddonnées dans une table de BDD
try {
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname",$user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	// requete sql préparée - évite les injections sql
	$prepare = $bdd->prepare("INSERT INTO utilisateurs (nom, prenom, email, motdepasse, competition) VALUES (:nom, :prenom, :mail, :motdepasse, :competition)");
    $prepare->bindParam(':nom', $nom);
    $prepare->bindParam(':prenom', $prenom);
    $prepare->bindParam(':mail', $email);
    $prepare->bindParam(':motdepasse', $mdp);
    $prepare->bindParam(':competition', $competition);
	$prepare->execute();
    // supprime l'objet BDD donc évite un trou de sécurité
    $bdd = null; 
	// redirection sur la page ajout.html pour refaire un autre ajout
    header('location:index.html');
    }
catch(PDOException $erreur)
    {
	// traitement des erreurs PHP SQL
		echo $erreur.' --  '. $erreur->getMessage();
    }
?>