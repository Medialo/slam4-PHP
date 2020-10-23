<?php

require_once (File::build_path(["model", 'ModelVoiture.php']));

//require_once ('../model/ModelVoiture.php'); // chargement du modï¿½le
class ControllerVoiture {

    public static function readall() {
        //$tab_v = ModelVoiture::getAllVoitures(); //appel au modï¿½le pour gerer la BD
        $tab_v = ModelVoiture::selectAll();
        $controller = 'voiture';
        $view = 'list';
        $pagetitle = "Liste des voitures";
        require (File::build_path(["view", 'view.php']));

        //require ('../view/voiture/list.php'); //"redirige" vers la vue
    }

    public static function read() {
        if (isset($_GET['immat'])) {
            $i = $_GET['immat'];
        }
        // $v = ModelVoiture::getVoitureByImmat($i); //appel au modï¿½le pour gerer la BD

        $v = ModelVoiture::select($i); //appel au modï¿½le pour gerer la BD
        if ($v != null) {
            $controller = 'voiture';
            $view = 'detail';
            $pagetitle = "Dï¿½tail de la voiture";
            require (File::build_path(["view", 'view.php']));
        }
        // require ('../view/voiture/detail.php'); //"redirige" vers la vue
        else
            require_once (File::build_path(["view", "voiture", 'error.php']));
        //  require ('../view/voiture/error.php'); //"redirige" vers la vue
    }

    public static function create() {

        $v = new ModelVoiture(null, null, null);
        $controller = 'voiture';
        $view = 'update';
        $pagetitle = "Création d'une voiture";
        $action = "index.php?action=created";

        require (File::build_path(["view", 'view.php']));


        //require (File::build_path(["view","voiture",'formulaireVoiture.html']));
        // require ('../view/voiture/formulaireVoiture.html'); //"redirige" vers la vue
    }

    public static function created() {
        if (isset($_POST['Immatriculation']) && isset($_POST['Couleur']) && isset($_POST['Marque'])) {

            $values = array(
                "immatriculation" => $_POST['Immatriculation'],
                "marque" => $_POST['Marque'],
                "couleur" => $_POST['Couleur'],
            );
            //ModelVoiture::save($_POST['Marque'],$_POST['Couleur'],$_POST['Immatriculation']);
            ModelVoiture::save($values);
        }
        $tab_v = ModelVoiture::selectAll(); //appel au modï¿½le pour gerer la BD
        $controller = 'voiture';
        $view = 'created';
        $pagetitle = "Voiture crï¿½ï¿½! + Liste";
        require (File::build_path(["view", 'view.php']));
        // require ('../view/voiture/formulaireVoiture.html'); //"redirige" vers la vue
    }

    public static function delete() {
        $immatriculation = "";
        if (isset($_GET['immat'])) {
            $immatriculation = $_GET['immat'];
            ModelVoiture::delete($immatriculation);
            //  require (File::build_path(["view","voiture",'deleted.php']));



            $tab_v = ModelVoiture::getAllVoitures(); //appel au modï¿½le pour gerer la BD
            $controller = 'voiture';
            $view = 'deleted';
            $pagetitle = "Voiture delete + Liste";
            require (File::build_path(["view", 'view.php']));
        }
    }

    public static function update() {
        $immatriculation = "";
        if (isset($_GET['immat'])) {
            $immatriculation = $_GET['immat'];
            $v = ModelVoiture::select($immatriculation);
            $controller = 'voiture';
            $view = 'update';
            $pagetitle = "Voiture Ã  update";
            $action = "index.php?action=updated";
            require (File::build_path(["view", 'view.php']));
        }
    }

    public static function updated() {
        if (isset($_POST['Immatriculation']) && isset($_POST['Couleur']) && isset($_POST['Marque'])) {
            $i = $_POST['Immatriculation'];
            $m = $_POST['Marque'];
            $c = $_POST['Couleur'];

            // ModelVoiture::update($m,$c,$i);
            $values = array(
                "Immatriculation" => $i,
                "Marque" => $m,
                "Couleur" => $c,
            );
            ModelVoiture::update($i, $values);
            $tab_v = ModelVoiture::selectAll();
            $controller = 'voiture';
            $view = 'updated';
            $pagetitle = "Voiture updated + Liste";
            require (File::build_path(["view", 'view.php']));
        } else {
            
        }
    }

}
