<!DOCTYPE html>
<html>
 <head>
 <meta charset="UTF-8">
 <title>Liste des voitures</title>
 </head>
 <body>
 <?php
 if(isset($tab_v) && count($tab_v)!=0)
 foreach ($tab_v as $v):
     if(empty($v->getImmatriculation()))
        echo "<p>Voiture d'immatriculation: Sans plaque!";
     else{
 ?>
     
     <p>Voiture d'immatriculation <a href="routeur.php?action=read&immat=<?=$v->getImmatriculation()?>" ><?=$v->getImmatriculation()?></a> </p>
     
     <?php 
     }
endforeach;
     ?>
     
 </body>
</html>