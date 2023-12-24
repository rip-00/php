<!DOCTYPE html>
<html lang="fr">
<head>
  <title>FORMATIK - BackOffice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
  <link href="../bootstrap-5.2.3/css/bootstrap.min.css" rel="stylesheet">
  <script src="../bootstrap-5.2.3/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head>
<body>
<?php
ini_set('session.save_path', '../sessions/');
session_start();

if(isset($_SESSION['idu']))
{
?>
	<div class="p-5 bg-primary text-white text-center">
	  <div><img src="../img/logo.png" alt="logo de Formatik"></div><h1>Gestion FORMATIK</h1>
	</div>
	<?php include_once 'menu.php' ?>

	<div class="container">
	  <h2>Choix du formateur à modifier</h2>
	  <div class="d-grid gap-2 d-md-block">
		<a href="AjoutFormateurs.php" class="btn btn-primary" type="button">Ajouter</a>
		<a href="ModifFormateurs.php" class="btn btn-success" role="button">Modifier</a>
		<a href="SupFormateurs.php"   class="btn btn-danger"  type="button">Supprimer</a>
	  </div><br/><br/>
	  <div>
	  <form action="ModifFormateurs2.php" method="POST">
	  <table class="table table-dark table-hover">
	  <thead>
		<tr>
		  <th scope="col">Choix</th>
		  <th scope="col">Nom</th>
		  <th scope="col">Prénom</th>
		  <th scope="col">Mail</th>
		  <th scope="col">Téléphone</th>
		</tr>
	  </thead>
	  <tbody>
		<?php
		include("conf_bdd.php");
		try 
		{
			$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			foreach($bdd->query('SELECT idf, fnom, fprenom, fmail, ftel FROM formateurs ORDER BY fnom, fprenom ASC') as $row) 
			{
				
				echo '<tr>
					<td><input type="radio" id="choix" name="choix" value="'.$row[0].'"></td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td>
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
else header('location:../connexion.htm'); // retour à la page connexion
?>
	</tbody>
	</table>
	<button type="submit" class="btn btn-primary">Valider</button>
    </form>
	</div>
</body>
</html>