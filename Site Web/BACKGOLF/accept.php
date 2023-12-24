<?php
//On démarre une nouvelle session
session_start();

// paramètres de la BDD
include("conf_bdd.php");
$id=$_POST['choix'];
$i=$id;
if ($i==1){
    $nom = $_POST[$i];
    $prenom = $_POST[$i+1];
    $mail = $_POST[$i+2];
    $competition = $_POST[$i+3];
}else{
    $i=$id+(4*($i-1));
    $nom = $_POST[$i];
    $prenom = $_POST[$i+1];
    $mail = $_POST[$i+2];
    $competition = $_POST[$i+3];
}

try {
    // connexion bdd
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // ajout du competiteur dans la base de données

    $prepare = $bdd->prepare("INSERT INTO golfeur (nom, prenom, mail,  competition) VALUES (:nom, :prenom, :mail,  :competition )");
		$prepare->bindParam(':nom', $nom);
		$prepare->bindParam(':prenom', $prenom);
		$prepare->bindParam(':mail', $mail);
		$prepare->bindParam(':competition', $competition);
        $prepare->execute();

   /* $sql = "DELETE FROM utilisateurs WHERE IDutilisateur = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $contactID);
    $stmt->execute();*/

    $bdd = null; 
    // redirection sur la page ajout.html pour refaire un autre ajout
    header('location:GestionPreinscription.php');

    }

    catch (PDOException $erreur) {
    // traitement des erreurs PHP SQL
    echo $erreur . ' --  ' . $erreur->getMessage();
}
?>