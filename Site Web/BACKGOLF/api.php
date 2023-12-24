<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API BACKOFFICE</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<table>
     <?php
    // Charger le fichier JSON (remplacez le chemin par votre fichier JSON)
    $cheminFichierJSON = 'http://localhost/GOLF+/save/donnees.json';

    // Lire le contenu du fichier JSON
    $jsonContenu = file_get_contents($cheminFichierJSON);

    // Convertir le JSON en tableau associatif
    $jsonData = json_decode($jsonContenu, true);

    // Afficher les entêtes du tableau
    echo '<tr>';
    foreach ($jsonData[0] as $entete => $valeur) {
        echo '<th>' . htmlspecialchars($entete) . '</th>';
    }
    echo '</tr>';

    // Afficher les données du tableau
    foreach ($jsonData as $ligne) {
        echo '<tr>';
        foreach ($ligne as $valeur) {
            echo '<td>' . htmlspecialchars($valeur) . '</td>';
        }
        echo '</tr>';
    }
    ?>
</table>

</body>
</html>
