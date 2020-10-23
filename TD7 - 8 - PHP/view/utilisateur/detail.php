 
 
 <?php
 if(isset($v))
 echo '<p> Login : ' . htmlspecialchars($v->getLogin()) . '.</p>';
  echo '<p> Prenom : ' . htmlspecialchars($v->getName()) . '.</p>';
   echo '<p> Nom : ' . htmlspecialchars($v->getFName()) . '.</p>';
 ?>

<a href="index.php?action=delete&login=<?= urlencode($v->getLogin()) ?>&controller=utilisateur" >Supprimer l'utilisateur</a>
<a href="index.php?action=update&login=<?= urlencode($v->getLogin()) ?>&controller=utilisateur" >Modifier l'utlisateur</a>