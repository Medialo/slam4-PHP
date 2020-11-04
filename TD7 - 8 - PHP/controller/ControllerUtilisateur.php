<?php

require_once (File::build_path(["model", 'ModelUtilisateur.php'])); //  Importation du model Utilisateur
require_once (File::build_path(["lib", 'security.php']));           //  Importation de la librairie de chiffrement 
require_once (File::build_path(["lib", 'session.php']));            //  Importation de la librairie de session

//require_once ('../model/ModelUtilisateur.php'); // chargement du mod�le
class ControllerUtilisateur {

    /**
     * Chaque méthode public représente donc une action possible attaché au controleur utilisateur,
     * le nom de la méthode doit être la même appelé sur l'url !
     */

    
    //méthode action pour lire tous les users
    public static function readall() { 
        //$tab_v = ModelUtilisateur::getAllUtilisateurs(); //appel au mod�le pour gerer la BD  // Methode avant le TD 6
        $tab_v = ModelUtilisateur::selectAll(); // On récupére un tableau avec tous les utilisateurs 
        $controller = 'utilisateur'; // on précise la le controleur pour la vue
        $view = 'list'; // la page qui doit être affiché
        $pagetitle = "Liste des utilisateurs"; // on précise aussi le titre de la page 
        require (File::build_path(["view", 'view.php'])); // enfin on appelle la vue qui va se charger d'afficher tous les utlisateurs

        //require ('../view/utilisateur/list.php'); //"redirige" vers la vue // Methode avant le TD 6
    }

    // méthode pour lire un utilisateurs précis
    public static function read() {
        if (isset($_GET['immat'])) {
            $i = $_GET['immat'];
        }
        //$v = ModelUtilisateur::getUtilisateurByImmat($i); //appel au mod�le pour gerer la BD // Methode avant le TD 6
        $v = ModelUtilisateur::select($i);
        if ($v != null) {
            $controller = 'utilisateur';
            $view = 'detail';
            $pagetitle = "D�tail de la utilisateur";
            require (File::build_path(["view", 'view.php']));
        }
        // require ('../view/utilisateur/detail.php'); //"redirige" vers la vue // Methode avant le TD 6
        else
            require_once (File::build_path(["view", "utilisateur", 'error.php']));
        //  require ('../view/utilisateur/error.php'); //"redirige" vers la vue // Methode avant le TD 6
    }

    // simple méthode action pour appeler la vue formulaire pour créer un user
    public static function create() {
        //require (File::build_path(["view","utilisateur",'create.html'])); // Methode avant le TD 6
        $v = new ModelUtilisateur(null, null, null);
        $controller = 'utilisateur';
        $view = 'update';
        $pagetitle = "Cr�ation d'un utlisateur";
        $action = "index.php?action=created&controller=utilisateur";
        require (File::build_path(["view", 'view.php']));

        // require (File::build_path(["view","utilisateur",'update.html'])); // Methode avant le TD 6
        // require ('../view/utilisateur/formulaireUtilisateur.html'); //"redirige" vers la vue // Methode avant le TD 6
    }

    public static function created() {
        if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['mdp']) && isset($_POST['mdp2']) && $_POST['mdp'] == $_POST['mdp2'] && isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $admin = "0";// on donne le role null par défaut 
            if (isset($_POST['admin'])) {
                $admin = $_POST['admin'];  // si l'utilisateur est admin et que son role est donné dans le formulaire alors on change la valeur de son role
            }
            $nonce = Security::generateRandomHex(); // on génére un nonce unique
            $values = array(
                "login" => $_POST['login'],
                "name" => $_POST['name'],
                "fname" => $_POST['fname'],                 // tableau des valeurs à ajouter dans la BDD
                "mdp" => Security::chiffrer($_POST['mdp']),
                "admin" => $admin,
                "email" => $_POST['email'],
                "nonce" => $nonce,
                
            );

            mail($_POST['email'],"Bienvenue",' <a href="http://127.0.0.1/slam4/index.php?action=validate&controller=utilisateur&nonce'.$nonce.'>Website</a> '); // on envoie le mail avec le nonce
            ModelUtilisateur::save($values); // on sauvegarde le nouvel user dans la  BDD
        }
        $tab_v = ModelUtilisateur::getAllUtilisateurs(); //appel au mod�le pour gerer la BD 
        $controller = 'utilisateur';
        $view = 'created';
        $pagetitle = "Utilisateur cr��! + Liste";
        require (File::build_path(["view", 'view.php']));
        // require ('../view/utilisateur/formulaireUtilisateur.html'); //"redirige" vers la vue // Methode avant le TD 6
    }

    public static function delete() {
        $log = "";
        if (isset($_GET['login'])) {
            $log = $_GET['login'];
            if (Session::is_user($log)) {
                ModelUtilisateur::delete($log);
                //  require (File::build_path(["view","utilisateur",'deleted.php'])); // Methode avant le TD 6
                $tab_v = ModelUtilisateur::selectAll(); //appel au mod�le pour gerer la BD
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

    //méthode action pour simplement appeler la vue avec le formulaire de connexion
    public static function connect() {
        $controller = 'utilisateur';
        $view = 'connect';
        $pagetitle = "Connexion";
        require (File::build_path(["view", 'view.php']));
    }

    //méthode action pour détruire la sessions d'un utilisateur pour le déconecter 
    public static function disconnect() {
        session_unset(); // unset $_SESSION variable for the run-time
        session_destroy(); // destroy session data in storage
        $controller = 'utilisateur';
        $view = 'list';
        $pagetitle = "Liste + (d�connexion)";
        require (File::build_path(["view", 'view.php'])); // on redirige l'utilisateur vers la liste d'utilisateur
    }
    

    // méthode action pour initialiser la session si ...
    public static function connected() {
        // on vérifie que le login et le mdp soit biens présent dans le formulaire ainsi que le nonce
        if (isset($_POST['login']) && isset($_POST['mdp']) && ModelUtilisateur::checkNonce($login)) {
            $login = $_POST['login'];
            $mdp = Security::chiffrer($_POST['mdp']); // on chiffre le mdp donné
            $bool = ModelUtilisateur::checkPassword($login, $mdp); // puis on le compare pour vérfier si l'utilisateur donne le bon mdp
            if ($bool) { // si c'est le bon mdp alors
                $_SESSION['login'] = $login; // on initalise la session
                if (ModelUtilisateur::isAdmin($login)) {
                    $_SESSION['admin'] = true; // ainsi qu'une variable boolean si l'utilisateur est admin
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

    // methode action pour mettre un jour un utilisateur
    public static function update() {
        $login = "";  // on initialise une varible de type string
        if (isset($_GET['login'])) { // on vérifie avant qu'un login soit donné dans l'url
            $login = $_GET['login']; // on enregistre cette valeur

            if (Session::is_user($login) || Session::is_admin()) { // ensuite on vérifie que la personne soit admin ou qu'elle soit elle même pour éditer ses infos
                $v = ModelUtilisateur::select($login); // on créer une variable avec l'utilisateur à modifier pour dire à la vue que l'on modifie un utilisateur
                $controller = 'utilisateur';                                    //
                $view = 'update';                                               //
                $action = "index.php?action=updated&controller=utilisateur";    // Dans le cas de la modification on appelle l'action updated
                $pagetitle = "Utilisateur à update";                            //
            } else {                                                            //
                $controller = 'utilisateur';                                    //
                $view = 'connect';                                              //  sinon on demande à l'utilisateur de se connecter
                $pagetitle = "Connexion";                                       //
            }
            require (File::build_path(["view", 'view.php']));
        } else {
            echo "vous devez etre superadmin!";
        }
    }

    // methode action pour mettre un jour un utilisateur dans la BDD
    public static function updated() {
        // on vérfie que out les champs du formulaire sont présent
        if (isset($_POST['login']) && isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['mdp']) && isset($_POST['mdp2']) && $_POST['mdp'] == $_POST['mdp2'] && isset($_POST['email'])) {
            $l = $_POST['login'];
            $admin = NULL; // on donne le role null par défaut 
            if (isset($_POST['admin']) && Session::is_admin()) { // si l'utilisateur est admin et que son role est donné dans le formulaire alors on change la valeur de son role
                $admin = $_POST['admin'];
            }

            

            if (Session::is_user($l) || Session::is_admin()) {// ensuite on vérifie que la personne soit admin ou qu'elle soit elle même pour éditer ses infos
                $n = $_POST['name'];
                $fn = $_POST['fname'];
                $mdp = Security::chiffrer($_POST['mdp']); // on chiffre le mot de passe
                $values = array(
                    "login" => $l,
                    "name" => $n,
                    "fname" => $fn,
                    "mdp" => $mdp,
                    "admin" => $admin,
                    "email" => $_POST['email'],
                    
                );
                ModelUtilisateur::update($l, $values); // on met a jour la BDD
                // ModelUtilisateur::update($m,$c,$i);  // Methode avant le TD 6
                $tab_v = ModelUtilisateur::selectAll(); // on select tous les users sur la BDD car on va afficher tous les utilisateurs
                $controller = 'utilisateur';
                $view = 'updated';
                $pagetitle = "Utilisateur updated + Liste";
            } else { // dans le cas contraire on demande à l'user de se connecter
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
