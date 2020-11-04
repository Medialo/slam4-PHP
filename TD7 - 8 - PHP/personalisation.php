<?php

if(isset($_POST['radio'])){ // Si arrivé sur cette page l'utilisateur à bien chosit une option
    setcookie("preference",$_POST['radio'],time() + 5000);// alors on enregistre un cookie avec cette donnée
       header('Location: index.php'); //puis on le redirige vers l'index.php qui prendra en compte son choix
  exit(); // par sécurité on arret ce script php suite à une redirection
  
}

