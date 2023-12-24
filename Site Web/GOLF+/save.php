<?php
// paramètres de la BDD
include("conf_bdd.php");

// Dossier où enregistrer le fichier JSON
$dossier_destination = "./save/";

// Création de la connexion
$conn = new mysqli("localhost", "root", "", "golf");

// Vérification de la connexion
if ($conn->connect_error) {
   die("La connexion a échoué : " . $conn->connect_error);
}

// Requête SQL pour récupérer des données (exemple)
$sql = "SELECT IDutilisateur, nom, prenom, email, competition FROM utilisateurs";
$result = $conn->query($sql);
//var_dump($result);
// Vérification de la réussite de la requête
if ($result->num_rows > 0) {
    // Initialisation du tableau qui contiendra les données
    $data = array();

    // Parcourir chaque ligne de résultats
    while ($row = $result->fetch_assoc()) {
        // Ajouter les données au tableau
        $data[] = $row;
    }

    // Fermer la connexion à la base de données
    $conn->close();

    // Convertir le tableau en format JSON
    $json_data = json_encode($data, JSON_PRETTY_PRINT);

    // Chemin complet du fichier JSON
    $chemin_fichier_json = $dossier_destination.'donnees.json';
    echo $chemin_fichier_json;
    // Écrire le JSON dans un fichier
    file_put_contents($chemin_fichier_json, $json_data);

    echo "Le fichier JSON a été créé avec succès dans le dossier spécifié.";
} else {
    echo "Aucune donnée trouvée dans la base de données.";
}
?>
