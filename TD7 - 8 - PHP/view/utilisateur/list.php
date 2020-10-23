<?php
 if(isset($tab_v) && count($tab_v)!=0)
 foreach ($tab_v as $v):
     if(empty($v->getLogin()))
        echo "<p>Utilisateur sans login!";
     else{
 ?>
     
     <p>Users : <a href="index.php?action=read&immat=<?= rawurlencode($v->getLogin()) ?>&controller=utilisateur" ><?= htmlspecialchars($v->getLogin())?></a> </p>
     
     <?php 
     }
endforeach;
     ?>
