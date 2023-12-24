<?php
if(isset($_SESSION['mail']))
{
	?>
  <head>
  <link rel="stylesheet" href="style.css"/>

<title>GOLF +</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  </head>
  <nav class="navbar">
        <img href="localhost/backindex1.html" class="logo" src="img/golf+ logo.svg" >
        
        <div class="nav-buttons">
           
            <ul class="main-nav">
  
            
      <li><a id="boutonnav" href="backindex1.html"><button type="button" class="btn btn-primary">Accueil</button></a></li>
              <li><a id="boutonnav" href="deconnexion.php"><button type="button" class="btn btn-primary">Déconnexion</button></a></li>
              <li><a id="boutonnav" href="newuser.html"><button type="button" class="btn btn-primary">créer un utilisateur</button></a></li>
              <li><a id="boutonnav" href="GestionPreinscription.php"><button type="button" class="btn btn-primary">Gestion préinscription</button></a></li>
              <li><a id="boutonnav" href="GestionApprenants.php"><button type="button" class="btn btn-primary">Gestion golfeur</button></a></li>
              <!--<li><a id="boutonnav"><button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Profil</button></a>-->
              </li>
              
  
          </ul>
        </div>
      </nav>
<!--<nav class="navbar navbar-expand-sm bg-dark navbar-dark" styles="color-background:#d9d5bb;">
  <div class="container-fluid">
    <ul class="navbar-nav">
	<li class="nav-item">
        <a class="nav-link active" href="backindex1.html">Accueil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="GestionRenseignements.php">Gestion des préinscriptions</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="GestionApprenants.php">Gestion Apprenants</a>
      </li>
	  <li class="nav-item">
        <a class="nav-link active" href="deconnexion.php">Déconnexion</a>
      </li>
      <li><a id="boutonnav" href="newuser.html"><button type="button" class="btn btn-primary">créer un utilisateur</button></a></li>
              <li><a id="boutonnav" href="GestionPreinscription.php"><button type="button" class="btn btn-primary">Gestion préinscription</button></a></li>
              <li><a id="boutonnav" href="GestionApprenants.php"><button type="button" class="btn btn-primary">Gestion golfeur</button></a></li>
    </ul>
  </div>
</nav>-->
<?php
}
else header('location:./index.html'); // retour à la page connexion
?>