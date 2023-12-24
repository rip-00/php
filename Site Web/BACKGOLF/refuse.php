<?php
// Solution par Ervoann
//On démarre une nouvelle session
session_start();

// paramètres de la BDD
include("conf_bdd2.php");

try {
    // connexion bdd
    $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération de l'ID du contact
    $contactID = $_GET['id'];


    // Suppression du contact de la base de données
    $sql = "DELETE FROM utilisateurs WHERE IDutilisateur = :id";
    $stmt = $bdd->prepare($sql);
    $stmt->bindParam(':id', $contactID);
    $stmt->execute();

    $bdd = null; 
    // redirection sur la page ajout.html pour refaire un autre ajout
    header('location:GestionPreinscription.php');

    }

    catch (PDOException $erreur) {
    // traitement des erreurs PHP SQL
    echo $erreur . ' --  ' . $erreur->getMessage();
}
?>