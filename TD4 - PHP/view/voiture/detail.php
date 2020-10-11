<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title>Liste des voitures</title>
 </head>
 <body>
 <?php
 if(isset($v))
 echo '<p> Voiture d\'immatriculation : ' . $v->getImmatriculation() . '.</p>';
  echo '<p> Voiture couleur : ' . $v->getCouleur() . '.</p>';
   echo '<p> Voiture de marque : ' . $v->getMarque() . '.</p>';
 ?>
 </body>
</html>
