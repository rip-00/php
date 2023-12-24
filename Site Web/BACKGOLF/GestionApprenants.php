<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion TELECOM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="img/favicon.ico">
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
	

	<?php include_once 'menu.php' ?>

	<div class="container">
	  <h2>Gestion des Apprenants</h2>
	  <div class="d-grid gap-2 d-md-block">
		<a href="AjoutApprenants.php" class="btn btn-primary" type="button">Ajouter</a>
		<!--<a href="ModifApprenants.php" class="btn btn-success" type="button">Modifier</a>
		<a href="SupApprenants.php"   class="btn btn-danger"  type="button">Supprimer</a>-->
	  </div><br/>

	  <table class="table table-dark table-hover">
	  <thead>
		<tr>
		  <th scope="col">ID</th>
		  <th scope="col">Nom</th>
		  <th scope="col">Prénom</th>
		  <th scope="col">Mail</th>
		  <th scope="col">Compétition</th>
		  
		</tr>
	  </thead>
	  <tbody>

		<?php
		include("conf_bdd.php");
		try 
		{
			$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			foreach($bdd->query('SELECT IDgolfeur, nom, prenom, mail, competition from golfeur order by IDgolfeur, nom, prenom ASC') as $row) 
			{
				
				echo '<tr>
					<td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td>
				</tr>';
			}
			$bdd = null;
		}
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
}
else header('location:./index.html'); // retour à la page connexion
?>
	</tbody>
	</table>

</body>
</html>