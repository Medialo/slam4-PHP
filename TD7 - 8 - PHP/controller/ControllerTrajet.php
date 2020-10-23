<?php
require_once (File::build_path(["model",'ModelTrajet.php']));
require_once (File::build_path(["model",'ModelUtilisateur.php']));

class ControllerTrajet {

    public static function readall() {
        $tab_v = ModelTrajet::selectAll();
        $controller='trajet';
        $view='list';
        $pagetitle="Liste des trajets";
        require (File::build_path(["view",'view.php']));
    }

    public static function read() {
        if(isset($_GET['id'])){
            $i = $_GET['id'];
        }
        //$v = ModelTrajet::gettrajetByImmat($i); //appel au modï¿½le pour gerer la BD
        $v = ModelTrajet::select($i); 
        if($v != null){
            $controller='trajet';
            $view='detail';
            $pagetitle="Dï¿½tail du trajet";
            require (File::build_path(["view",'view.php']));
        }
        // require ('../view/trajet/detail.php'); //"redirige" vers la vue
        else
            require_once (File::build_path(["view","trajet",'error.php']));
        //  require ('../view/trajet/error.php'); //"redirige" vers la vue
    }

    public static function create() {
        //require (File::build_path(["view","trajet",'create.html']));
        $tab_u = ModelUtilisateur::selectAll();
          $v = new ModelTrajet();
        $controller='trajet';
        $view='update';
        $pagetitle="Création d'un trajet";
           $action = "index.php?action=created&controller=trajet";
        require (File::build_path(["view",'view.php']));
       
//        require (File::build_path(["view","trajet",'update.html']));
        // require ('../view/trajet/formulairetrajet.html'); //"redirige" vers la vue
    }

    public static function created() {
        if(isset($_POST['id']) && isset($_POST['pointDeDepart']) && isset($_POST['pointDarriver']) && isset($_POST['datet']) && isset($_POST['nbplaces']) && isset($_POST['prix']) && isset($_POST['conducteur_login'])){
           
            $values = array(
                "id" => $_POST['id'],
                "pointDeDepart" => $_POST['pdt'],
                "pointDarriver" => $_POST['pd'],
                "datet" => $_POST['datet'],
                "nbplaces" => $_POST['nbp'],
                "prix" => $_POST['prix'],
                "conducteur_login" => $_POST['cl'],
                
            );
            
            
            ModelTrajet::save($values);

        }
        $tab_v = ModelTrajet::getAlltrajets(); //appel au modï¿½le pour gerer la BD
        $controller='trajet';
        $view='created';
        $pagetitle="trajet crï¿½ï¿½! + Liste";
        require (File::build_path(["view",'view.php']));
        // require ('../view/trajet/formulairetrajet.html'); //"redirige" vers la vue
    }

    public static function delete()
    {
        $immatriculation = "";
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            ModelTrajet::delete($id);
            //  require (File::build_path(["view","trajet",'deleted.php']));



            $tab_v = ModelTrajet::selectAll(); //appel au modï¿½le pour gerer la BD
            $controller='trajet';
            $view='deleted';
            $pagetitle="trajet delete + Liste";
            require (File::build_path(["view",'view.php']));
        }

    }

    public static function update(){
        $id = "";
        if(isset($_GET['id'])){
            $tab_u = ModelUtilisateur::selectAll();
            $id = $_GET['id'];
            $v = ModelTrajet::select($id);
            $controller='trajet';
            $view='update';
            $action = "index.php?action=updated&controller=trajet";
            $pagetitle="trajet Ã  update";
            require (File::build_path(["view",'view.php']));
        }

    }

    public static function updated(){
            if(isset($_POST['id']) && isset($_POST['pdt']) && isset($_POST['pd']) && isset($_POST['datet']) && isset($_POST['nbp']) && isset($_POST['prix']) && isset($_POST['cl'])){
            $id = $_POST['id'];


            $values = array(
                "id" => $_POST['id'],
                "pointDeDepart" => $_POST['pdt'],
                "pointDarriver" => $_POST['pd'],
                "datet" => $_POST['datet'],
                "nbplaces" => $_POST['nbp'],
                "prix" => $_POST['prix'],
                "conducteur_login" => $_POST['cl'],
                
            );
            
            ModelTrajet::update($id, $values);
           // ModelTrajet::update($m,$c,$i);
            $tab_v = ModelTrajet::selectAll();
            $controller='trajet';
            $view='updated';
            $pagetitle="trajet updated + Liste";
            require (File::build_path(["view",'view.php']));
        } else {
            if(!isset($_POST['id'])){
                echo 'id';
            }
            if(!isset($_POST['pdt'])){
                echo 'pdt';
            }
            if(!isset($_POST['pd'])){
                echo 'pd';
            }
            if(!isset($_POST['datet'])){
                echo 'datet';
            }
            if(!isset($_POST['nbp'])){
                echo 'nbp';
            }
            if(!isset($_POST['cl'])){
                echo 'cl';
            }
            
        }


    }
}

