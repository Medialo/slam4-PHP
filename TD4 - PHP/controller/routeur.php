<?php
require_once 'ControllerVoiture.php';
// On recup�re l'action pass�e dans l'URL
$action = $_GET['action'];
// Appel de la m�thode statique $action de ControllerVoiture
ControllerVoiture::$action();
?>
