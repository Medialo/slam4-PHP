 
 
 <?php
 if(isset($v))
 echo '<p> Voiture d\'immatriculation : ' . htmlspecialchars($v->getImmatriculation()) . '.</p>';
  echo '<p> Voiture couleur : ' . htmlspecialchars($v->getCouleur()) . '.</p>';
   echo '<p> Voiture de marque : ' . htmlspecialchars($v->getMarque()) . '.</p>';
 ?>

<a href="index.php/action=" ></a>
