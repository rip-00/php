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
	  <h2>Modification formateurs</h2>
	  <div class="d-grid gap-2 d-md-block">
		<a href="AjoutFormateurs.php" class="btn btn-primary" type="button">Ajouter</a>
		<a href="ModifFormateurs.php" class="btn btn-success" type="button">Modifier</a>
		<a href="SupFormateurs.php"   class="btn btn-danger"  type="button">Supprimer</a>
	  </div><br/><br/>
	  	<?php
		include("conf_bdd.php");
		$idf = $_POST['choix'];
		$_SESSION['idf'] = $idf;
		try 
		{
			$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
			$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			foreach($bdd->query('SELECT fnom, fprenom, fmail, ftel FROM formateurs WHERE idf="'.$idf.'"') as $row) 
			{
			}
			$bdd = null;
			  echo '<div class="card">
                <div class="container">
                    <form action="ModifFormateursUp.php" method="POST">
                        <div class="form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" placeholder="'.$row[0].'" name="nom" >
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" placeholder="'.$row[1].'" name="prenom" >
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="'.$row[2].'" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        </div>
                        <div class="form-group">
                            <label for="objet">Téléphone:</label>
                            <input type="text" class="form-control" id="objet" name="tel" placeholder="'.$row[3].'" pattern="[0-9{10,10}$">
                        </div>
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                </div>
                </div>';
		}
		catch (PDOException $e) 
		{
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
}
else header('location:../connexion.htm'); // retour à la page connexion
?>
</body>
</html>