<?php

require_once (File::build_path(["model", 'ModelUtilisateur.php']));
require_once (File::build_path(["lib", 'security.php']));
require_once (File::build_path(["lib", 'session.php']));

//require_once ('../model/ModelUtilisateur.php'); // chargement du modï¿½le
class ControllerUtilisateur {

    public static function readall() {
        //$tab_v = ModelUtilisateur::getAllUtilisateurs(); //appel au modï¿½le pour gerer la BD
        $tab_v = ModelUtilisateur::selectAll();
        $controller = 'utilisateur';
        $view = 'list';
        $pagetitle = "Liste des utilisateurs";
        require (File::build_path(["view", 'view.php']));

        //require ('../view/utilisateur/list.php'); //"redirige" vers la vue
    }

    public static function read() {
        if (isset($_GET['immat'])) {
            $i = $_GET['immat'];
        }
        //$v = ModelUtilisateur::getUtilisateurByImmat($i); //appel au modï¿½le pour gerer la BD
        $v = ModelUtilisateur::select($i);
        if ($v != null) {
            $controller = 'utilisateur';
            $view = 'detail';
            $pagetitle = "Dï¿½tail de la utilisateur";
            require (File::build_path(["view", 'view.php']));
        }
        // require ('../view/utilisateur/detail.php'); //"redirige" vers la vue
        else
            require_once (File::build_path(["view", "utilisateur", 'error.php']));
        //  require ('../view/utilisateur/error.php'); //"redirige" vers la vue
    }

    public static function create() {
        //require (File::build_path(["view","utilisateur",'create.html']));
        $v = new ModelUtilisateur(null, null, null);
        $controller = 'utilisateur';
        $view = 'update';
        $pagetitle = "Création d'un utlisateur";
        $action = "index.php?action=created&controller=utilisateur";
        require (File::build_path(["view", 'view.php']));

//        require (File::build_path(["view","utilisateur",'update.html']));
        // require ('../view/utilisateur/formulaireUtilisateur.html'); //"redirige" vers la vue
    }

    public static function created() {
        if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['mdp']) && isset($_POST['mdp2']) && $_POST['mdp'] == $_POST['mdp2'] && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $admin = "0";
            if (isset($_POST['admin'])) {
                $admin = $_POST['admin'];
            }
            $nonce = Security::generateRandomHex();
            $values = array(
                "login" => $_POST['login'],
                "name" => $_POST['name'],
                "fname" => $_POST['fname'],
                "mdp" => Security::chiffrer($_POST['mdp']),
                "admin" => $admin,
                "email" => $_POST['email'],
                "nonce" => $nonce,
                
            );

            mail($_POST['email'],"Bienvenue",' <a href="http://127.0.0.1/slam4/index.php?action=validate&controller=utilisateur&nonce'.$nonce.'>Website</a> ');
            ModelUtilisateur::save($values);
        }
        $tab_v = ModelUtilisateur::getAllUtilisateurs(); //appel au modï¿½le pour gerer la BD
        $controller = 'utilisateur';
        $view = 'created';
        $pagetitle = "Utilisateur crï¿½ï¿½! + Liste";
        require (File::build_path(["view", 'view.php']));
        // require ('../view/utilisateur/formulaireUtilisateur.html'); //"redirige" vers la vue
    }

    public static function delete() {
        $log = "";
        if (isset($_GET['login'])) {
            $log = $_GET['login'];

            if (Session::is_user($log)) {
                ModelUtilisateur::delete($log);
                //  require (File::build_path(["view","utilisateur",'deleted.php']));
                $tab_v = ModelUtilisateur::selectAll(); //appel au modï¿½le pour gerer la BD
                $controller = 'utilisateur';
                $view = 'deleted';
                $pagetitle = "Utilisateur delete + Liste";
            } else {
                $controller = 'utilisateur';
                $view = 'connect';
                $pagetitle = "Connexion";
            }


            require (File::build_path(["view", 'view.php']));
        }
    }

    public static function connect() {
        $controller = 'utilisateur';
        $view = 'connect';
        $pagetitle = "Connexion";
        require (File::build_path(["view", 'view.php']));
    }

    public static function disconnect() {
        session_unset(); // unset $_SESSION variable for the run-time
        session_destroy(); // destroy session data in storage
        $controller = 'utilisateur';
        $view = 'list';
        $pagetitle = "Liste + (déconnexion)";
        require (File::build_path(["view", 'view.php']));
    }

    public static function connected() {
        if (isset($_POST['login']) && isset($_POST['mdp']) && ModelUtilisateur::checkNonce($login)) {
            $login = $_POST['login'];
            $mdp = Security::chiffrer($_POST['mdp']);
            $bool = ModelUtilisateur::checkPassword($login, $mdp);
            if ($bool) {
                $_SESSION['login'] = $login;
                if (ModelUtilisateur::isAdmin($login)) {
                    $_SESSION['admin'] = true;
                }
                $controller = 'utilisateur';
                $view = 'list';
                $pagetitle = "Liste + (connexion ok)";
                require (File::build_path(["view", 'view.php']));
            } else {
                echo "mauvais mdp!";
            }
        } else {
            echo "error";
        }
    }

    public static function update() {
        $login = "";
        if (isset($_GET['login']) && Session::is_admin()) {
            $login = $_GET['login'];

            if (Session::is_user($login) || Session::is_admin()) {
                $v = ModelUtilisateur::select($login);
                $controller = 'utilisateur';
                $view = 'update';
                $action = "index.php?action=updated&controller=utilisateur";
                $pagetitle = "Utilisateur Ã  update";
            } else {
                $controller = 'utilisateur';
                $view = 'connect';
                $pagetitle = "Connexion";
            }
            require (File::build_path(["view", 'view.php']));
        } else {
            echo "vous devez etre superadmin!";
        }
    }

    public static function updated() {
        if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['mdp']) && isset($_POST['mdp2']) && $_POST['mdp'] == $_POST['mdp2'] && isset($_POST['email'])) {
            $l = $_POST['login'];
            $admin = NULL;
            if (isset($_POST['admin'])) {
                $admin = $_POST['admin'];
            }



            if (Session::is_user($l) || Session::is_admin()) {
                $n = $_POST['name'];
                $fn = $_POST['fname'];
                $mdp = Security::chiffrer($_POST['mdp']);
                $values = array(
                    "login" => $l,
                    "name" => $n,
                    "fname" => $fn,
                    "mdp" => $mdp,
                    "admin" => $admin,
                    "email" => $_POST['email'],
                    
                );
                ModelUtilisateur::update($l, $values);
                // ModelUtilisateur::update($m,$c,$i);
                $tab_v = ModelUtilisateur::selectAll();
                $controller = 'utilisateur';
                $view = 'updated';
                $pagetitle = "Utilisateur updated + Liste";
            } else {
                $controller = 'utilisateur';
                $view = 'connect';
                $pagetitle = "Connexion";
            }

            require (File::build_path(["view", 'view.php']));
        } else {
            echo "error";
        }
    }

}
