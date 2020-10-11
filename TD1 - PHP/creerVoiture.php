<?php
include('voiture.php');



if(isset($_POST['marque']) && isset($_POST['couleur']) && isset($_POST['immatriculation'])){
    $v = new voiture($_POST['marque'],$_POST['couleur'],"");
    $v->setImmatriculation($_POST['immatriculation']);

    $v->afficher();
} else {
    echo "erreur";
}