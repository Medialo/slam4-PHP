
<?php
require_once './trajet.php';
require_once './user.php';



/** @var type $_GET */
if (isset($_GET['idl']) && isset($_GET['idt'])) {
    $idt = htmlspecialchars($_GET['idt']);
    $idl = htmlspecialchars($_GET['idl']);
    $data = ["trajet_id" => $idt,
        "utilisateur_login" => $idl];
    //echo $data['trajet_id']." ".$data['utilisateur_login'];
    Trajet::deletePassager($data);
}


