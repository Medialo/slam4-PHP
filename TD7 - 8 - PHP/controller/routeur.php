<?php

error_reporting(0);
//require_once 'ControllerVoiture.phql'URL

// Appel de la m�thode statique $action de ControllerVoiture

$controller_class = "";     // Initialisations de deux variables
$controller = "voiture";    // pour enregistrer la class ainsi que le controleur
if(isset($_COOKIE['preference'])){ // si le cookie de preference est set alors on l'utilise
    $controller = $_COOKIE['preference'];
}
if(isset($_GET['controller'])){ // si dans l'url un controleur est donné alors on l'utilise
    $controller_class = "Controller".ucfirst($_GET['controller']); // On met en majuscule la première lettre pour correspondre au fichier
	try {// on essaie d'importer le fichier
		include_once(File::build_path(["controller",$controller_class.".php"]));
	} catch (Exception $e){
		
	}
    
    if(class_exists($controller_class)){ // et on vérfie que la class existe bien SINON
        $controller = $_GET['controller'];
    } else {                                                                        //
        $controller_class = "Controller".ucfirst($controller);                      // Dans le cas contraire on
        require_once (File::build_path(["controller",$controller_class.".php"]));   // appelle le controleur 
    }                                                                               // par défaut, qui est 
} else {                                                                            // le controleur "voiture"
    $controller_class = "Controller".ucfirst($controller);                          // 
    require_once (File::build_path(["controller",$controller_class.".php"]));       // 
}

// ensuite on lit l'action 
if(!isset($_GET['action'])){ // si celle-ci n'est pas presente
    $action = "readall"; // on donne l'action "readall" par défaut"
    $controller_class::$action();
} elseif (in_array($_GET['action'],get_class_methods($controller_class))) { // sinon on vérifie que la méthode existe avant de l'éxécuter
    $action = $_GET['action'];
    $controller_class::$action();
} else { // sinon si l'action donné n'exsite pas alors on affiche une page d'erreur
    require (File::build_path(["view",$controller,'error.php']));
} 

?>
