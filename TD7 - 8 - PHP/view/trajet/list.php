<?php
 if(isset($tab_v) && count($tab_v)!=0)
 foreach ($tab_v as $v):
     if(empty($v->getId()))
        echo "<p>Utilisateur sans id!";
     else{
 ?>
     
     <p>Users : <a href="index.php?action=read&id=<?= rawurlencode($v->getId()) ?>&controller=trajet" ><?= htmlspecialchars($v->getId())?></a> </p>
     
     <?php 
     }
endforeach;
     ?>
