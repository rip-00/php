<!DOCTYPE html>
<html lang="fr">
<head>
  <title>Gestion TELECOM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="icon" type="image/x-icon" href="../img/favicon.ico">
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
	<div class="p-5  text-black text-center" styles="background-color:#d9d5bb;">
	  <div><img src="img/golf+ logo.svg" alt="logo de golf+" styles="max-height: 100px; !important"></div><h1>Gestion compétiteur</h1>
	</div>

	<?php include_once 'menu.php' ?>

	<div class="container">
	  <h2>Ajouter un apprenant</h2>
	  <div class="d-grid gap-2 d-md-block">
		<a href="AjoutFormateurs.php" class="btn btn-primary" type="button">Ajouter</a>
		<a href="ModifFormateurs.php" class="btn btn-success" type="button">Modifier</a>
		<a href="SupFormateurs.php"   class="btn btn-danger"  type="button">Supprimer</a>
	  </div><br/>
	  <div class="card">
                <div class="container">
                    <form action="AjoutAppren.php" method="POST">
					
                        <div class="form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control" id="nom" name="nom">
                        </div>
                        <div class="form-group">
                            <label for="prenom">Prénom:</label>
                            <input type="text" class="form-control" id="prenom" name="prenom">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                        </div>
                        <!--<div class="form-group">
                            <label for="objet">Téléphone:</label>
                            <input type="text" class="form-control" id="objet" name="tel" pattern="[0-9{10,10}$">
                        </div>-->
						<div class="form-group">
								<label for="formation">Compétition :</label><br/>
								<select id="formation" name="competition" >
								  <option value=""></option>
								  <option value="semaine 25">2-10</option>
								  <option value="semaine 26">10-20</option>
								  <option value="semaine 27">20-30</option>
								</select>
							</div> 
                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                </div>
                </div>
<?php
}
else header('location:../index.htm'); // retour à la page connexion
?>
</body>
</html>