<?php

require_once (File::build_path(["controller","ControllerVoiture.php"]));
//require_once 'ControllerVoiture.phql'URL

// Appel de la m�thode statique $action de ControllerVoiture


    if(isset($_GET['action'])){
        if(in_array($_GET['action'],get_class_methods("ControllerVoiture"))) {
            $action = $_GET['action'];
        } else {
            $action = "readall";
        }
        ControllerVoiture::$action();
    } else {
        require (File::build_path(["view","voiture",'error.html']));
    }
   
    

?>
