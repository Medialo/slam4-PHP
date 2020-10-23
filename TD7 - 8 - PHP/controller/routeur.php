<?php

//require_once 'ControllerVoiture.phql'URL

// Appel de la m�thode statique $action de ControllerVoiture

$controller_class = "";
$controller = "voiture";
if(isset($_COOKIE['preference'])){
    $controller = $_COOKIE['preference'];
}
if(isset($_GET['controller'])){
    $controller_class = "Controller".ucfirst($_GET['controller']);
    require_once (File::build_path(["controller",$controller_class.".php"]));
    if(class_exists($controller_class)){
        $controller = $_GET['controller'];
    }
} else {
    $controller_class = "Controller".ucfirst($controller);
    require_once (File::build_path(["controller",$controller_class.".php"]));
}









if(!isset($_GET['action'])){
    $action = "readall";
    $controller_class::$action();
} elseif (in_array($_GET['action'],get_class_methods($controller_class))) {
    $action = $_GET['action'];
    $controller_class::$action();
} else {
    require (File::build_path(["view",$controller,'error.php']));
} 

?>
