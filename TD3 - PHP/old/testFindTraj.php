<?php
require_once './trajet.php';
require_once './user.php';



/** @var type $_GET */
if (isset($_GET['id'])) {
    $id = htmlspecialchars($_GET['id']);
    foreach (trajet::findTrajets($id) as $u) {
        $u->afficher();
    }
}


