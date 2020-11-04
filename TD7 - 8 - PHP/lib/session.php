<?php

class Session {

    private function __construct() {
        
    }

    // permet de s'avoir si un login est celui de l'utilisateur connecté
    public static function is_user($login) {
        return (!empty($_SESSION['login']) && ($_SESSION['login'] == $login));
    }

    //Fonction qui permet de s'avoir si un utilisateur est admin ou non
    public static function is_admin() {
        return (!empty($_SESSION['admin']) && $_SESSION['admin']);
    }

}
