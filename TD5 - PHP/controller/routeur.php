<?php

require_once (File::build_path(["controller","ControllerVoiture.php"]));
//require_once 'ControllerVoiture.phql'URL
$action = $_GET['action'];
// Appel de la m�thode statique $action de ControllerVoiture

    ControllerVoiture::$action();

?>
