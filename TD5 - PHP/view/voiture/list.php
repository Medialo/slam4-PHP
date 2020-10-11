<?php
 if(isset($tab_v) && count($tab_v)!=0)
 foreach ($tab_v as $v):
     if(empty($v->getImmatriculation()))
        echo "<p>Voiture d'immatriculation: Sans plaque!";
     else{
 ?>
     
     <p>Voiture d'immatriculation <a href="index.php?action=read&immat=<?= rawurlencode($v->getImmatriculation()) ?>" ><?= htmlspecialchars($v->getImmatriculation())?></a> </p>
     
     <?php 
     }
endforeach;
     ?>
