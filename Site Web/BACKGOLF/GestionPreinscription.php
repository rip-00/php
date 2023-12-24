<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion TELECOM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
   <link href="bootstrap-5.2.3/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
<?php
session_start();
if(isset($_SESSION['mail']))
{
?>
<!--	<div class="p-5 bg-primary text-white text-center">
	  <div><img src="../images/logo.svg" width=25%></div><h1>Gestion TELECOM</h1>
	</div>-->

	<?php include_once 'menu.php' ?>

	<div class="container">
	  <h2>Traitement Pré-inscription aux competitions</h2>
	  
	  <p>
	  <form action="accept.php" method="POST">
	  <table class="table table-dark table-hover">
		<?php
	  // Charger le fichier JSON (remplacez le chemin par votre fichier JSON)
    $cheminFichierJSON = 'http://localhost/GOLF+/save/donnees.json';

    // Lire le contenu du fichier JSON
    $jsonContenu = file_get_contents($cheminFichierJSON);

    // Convertir le JSON en tableau associatif
    $jsonData = json_decode($jsonContenu, true);

    

				// Afficher les entêtes du tableau
				echo '<tr><th>SELECT</th>';
				foreach ($jsonData[0] as $entete => $valeur) {
					echo '<th>' . htmlspecialchars($entete) . '</th>';
				}
				echo '</tr>';
				?>
	  <tbody> 
		<?php
    
	$j=0;
	$id=1;
				// Afficher les données du tableau
				foreach ($jsonData as $ligne) {
					
					echo '<tr>';
					$i=0;
					
					foreach ($ligne as $valeur) {
					if ($i==0){
						$i++;
						$val=$id;
							
							echo '<td><input type="radio" id="choix" name="choix" value="'.$val.'"><input class="Main btn btn-danger" type="button" value="Refuser" name='.$val.' onclick="location.href = '."&#39;".'./refuse.php?id='.$val.''."&#39;".'"/></td>';
						}
						echo '<td><input type="text" name="'.$j.'" value="'.$valeur.'" placeholder="'.htmlspecialchars($valeur).'"/></td>';
						$j++;
					}
					echo '</tr>';
					$id++;
				}
}
else header('location:../index.htm'); // retour à la page connexion


?>

	</tbody>
	</table>
	<button type="submit" class="btn btn-danger">Valider la pré-inscription</button>
    </form>
</body>
</html>