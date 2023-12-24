<?php
// paramètres de la BDD
include("conf_bdd.php");
$login=$_POST['mail'];
$mdp=$_POST['mdp'];
var_dump($_POST['mail']);

$grain='1%Yu9!#';
$mdpc=sha1(sha1($mdp).$grain);
echo $login;
echo ' '.$mdpc;
