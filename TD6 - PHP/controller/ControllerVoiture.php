<?php
require_once (File::build_path(["model",'ModelVoiture.php']));
//require_once ('../model/ModelVoiture.php'); // chargement du mod�le
class ControllerVoiture {
    
 public static function readAll() {
 $tab_v = ModelVoiture::getAllVoitures(); //appel au mod�le pour gerer la BD
 $controller='voiture';
 $view='list';
 $pagetitle="Liste des voitures";
 require (File::build_path(["view",'view.php']));
 
 //require ('../view/voiture/list.php'); //"redirige" vers la vue
 }
 
 public static function read() {
 if(isset($_GET['immat'])){
     $i = $_GET['immat'];
 }
 $v = ModelVoiture::getVoitureByImmat($i); //appel au mod�le pour gerer la BD
 if($v != null){
      $controller='voiture';
 $view='detail';
 $pagetitle="D�tail de la voiture";
 require (File::build_path(["view",'view.php']));
 }
   // require ('../view/voiture/detail.php'); //"redirige" vers la vue
 else
     require_once (File::build_path(["view","voiture",'error.php']));
  //  require ('../view/voiture/error.php'); //"redirige" vers la vue
 }
 
  public static function create() {
      require (File::build_path(["view","voiture",'formulaireVoiture.html']));
   // require ('../view/voiture/formulaireVoiture.html'); //"redirige" vers la vue
 }
 
   public static function created() {
      if(isset($_POST['Immatriculation']) && isset($_POST['Couleur']) && isset($_POST['Marque'])){
          ModelVoiture::save($_POST['Marque'],$_POST['Couleur'],$_POST['Immatriculation']);
          
      }
       $tab_v = ModelVoiture::getAllVoitures(); //appel au mod�le pour gerer la BD
    $controller='voiture';
    $view='created';
    $pagetitle="Voiture cr��! + Liste";
      require (File::build_path(["view",'view.php']));
   // require ('../view/voiture/formulaireVoiture.html'); //"redirige" vers la vue
 }

public static function delete()
{
  $immatriculation = "";
  if(isset($_GET['immat'])){
      $immatriculation = $_GET['immat'];
  }
 ModelVoiture::deleteByImmat($immatriculation);
 require (File::build_path(["view",'deleted.php']));
}


}
