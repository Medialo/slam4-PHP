<?php

require_once './model.php';
require_once './voiture.php';
//require_once './trajet.php';
//require_once './user.php';

/*$rep = Model::$pdo->query("Select * FROM voiture");

print_r($rep);
echo "<br>";
echo "<br>";

$tab_obj = $rep->fetchAll(PDO::FETCH_OBJ);

echo "<br>";
echo "<br>";

print_r($tab_obj);

echo "<br>";
echo "<br>";
foreach($tab_obj as $voiturepasvoiture){
    echo $voiturepasvoiture->marque." ".$voiturepasvoiture->couleur." ".$voiturepasvoiture->immatriculation;
}


echo "<br>";
echo "<br>";

$rep = Model::$pdo->query("Select * FROM voiture");
$rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
$tab_voit = $rep->fetchAll();



foreach($tab_voit as $voiture){
   $voiture->afficher(); 
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

foreach(Voiture::getAllVoiture() as $voiture){
    $voiture->afficher(); 
}

*/

Voiture::getVoitureByImmat("5f3zefe3")->afficher();

Voiture::Save("KoalaCar","Noir","KKK66678");