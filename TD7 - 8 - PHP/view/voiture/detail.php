 
 
 <?php
 if(isset($v))
 echo '<p> Voiture d\'immatriculation : ' . htmlspecialchars($v->getImmatriculation()) . '.</p>';
  echo '<p> Voiture couleur : ' . htmlspecialchars($v->getCouleur()) . '.</p>';
   echo '<p> Voiture de marque : ' . htmlspecialchars($v->getMarque()) . '.</p>';
 ?>

<a href="index.php?action=delete&immat=<?= urlencode($v->getImmatriculation()) ?>" >Supprimer la voiture</a>
<a href="index.php?action=update&immat=<?= urlencode($v->getImmatriculation()) ?>" >Modifier la voiture</a>