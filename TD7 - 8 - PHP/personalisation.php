<?php
if(isset($_POST['radio'])){
    setcookie("preference",$_POST['radio'],time() + 5000);
    
       header('Location: index.php');
  exit();
  
}

