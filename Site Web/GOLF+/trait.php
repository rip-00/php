<!DOCTYPE html>
<html lang="fr">
<head>
  
<title>JEUX C TOUT</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="logo.png">

        <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

        <link rel="stylesheet" href="style.css"/>
</head>
<body>
<nav>
            <img src="img/logo.png" alt="image1">
            <ul class="main-nav">

                
            <li><a href="./index.html"><button style="font-size:18px;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling">Déconnexion</button></a></li>
                  <li><a id="boutonnav"><button style="font-size:18px;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Profil</button></a>
                </li>

            </ul>

        </nav>

        <H1 style="padding: left 200px;">Vos résultats</H1>
        <p style="margin-left: 100px; margin-right: 100px;">Vous trouverez tous vos résultats sur votre profil. Pour recommencer un questionnaire nous vous invitons à cliquer sur le bouton ci dessous.</p>
        <li style="margin-left: 100px; margin-right: 100px; list-style:none;"><a href="./quiz.html"><button style="font-size:18px;" class="btn btn-primary" type="button" data-bs-toggle="offcanvas" aria-controls="offcanvasScrolling">Rejouer !</button></a></li>




<div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h1 class="offcanvas-title" id="offcanvasScrollingLabel">Profil</h1>
    <button type="button"  class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <body>
    
    <div class="statistics">
    <?php
//On démarre une nouvelle session
session_start();

// vérification session active
if(isset($_SESSION['mail']))
{
	
    // paramètres de la BDD
    include("conf_bdd.php");

    try 
    {
        // connexion bdd
        $bdd = new PDO("mysql:host=$servername;dbname=$dbname", $user, $pass);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // on récupère les données
        $i = $_SESSION['nbq'];
        $tabrep = $_SESSION['idq'];

        $k=0; // créer les questions
        $j=1; // numérotation des questions
        $result = 0; // résultat du quiz

       
        While ($k<$i)
        {

            // récupération des réponses aux questions
            $reponse[$k] = $_POST["q$k"]; 
            // récupération des questions et affichage
            foreach($bdd->query('SELECT idquestion, Question, A, B, C, D, reponse from question where idquestion = "'.$tabrep[$k].'" ') as $row)
            {
                echo '<p> Question '.$j.' : '.$row[1].'<br/> Votre réponse : '.$reponse[$k].'<br/>';
                if ($row[6]==$reponse[$k])
                {
                    switch($row[6])
                    {
                        case 'A' : echo '<font color=green>Juste -- '.$row[2].'</font><br/>'; break;
                        case 'B' : echo '<font color=green>Juste -- '.$row[3].'</font><br/>'; break;
                        case 'C' : echo '<font color=green>Juste -- '.$row[4].'</font><br/>'; break;
                        case 'D' : echo '<font color=green>Juste -- '.$row[5].'</font><br/>'; break;
                    }
                    $result++;
                }
                else {
                    switch($row[6])
                    {
                        case 'A' : echo '<font color=red>Faux -- La bonne réponse est '.$row[2].'</font><br/>'; break;
                        case 'B' : echo '<font color=red>Faux -- La bonne réponse est '.$row[3].'</font><br/>'; break;
                        case 'C' : echo '<font color=red>Faux -- La bonne réponse est '.$row[4].'</font><br/>'; break;
                        case 'D' : echo '<font color=red>Faux -- La bonne réponse est '.$row[5].'</font><br/>'; break;
                    }
                }
                echo '</p>';
            } 
            $k++;
            $j++;
        }
        $bdd = null; 
        echo '<h2>Le résultat du quiz est de '.round($result*100/$i,2).' %</h2>'; // ROUND arrondi les calucls 2 chiffres après la virgule
    }
    catch(PDOException $erreur)
        {
        // traitement des erreurs PHP SQL
            echo $erreur.' --  '. $erreur->getMessage();
        }
}
else header('location:index.html'); // retour à la page connexion
?>
  
  </div>


  <footer>
<p>©Copyright JEUX C TOUT</p>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>