<?php
require_once ('../model/ModelVoiture.php'); // chargement du modèle
class ControllerVoiture {
    
 public static function readAll() {
 $tab_v = ModelVoiture::getAllVoitures(); //appel au modèle pour gerer la BD
 require ('../view/voiture/list.php'); //"redirige" vers la vue
 }
 
 public static function read() {
 if(isset($_GET['immat'])){
     $i = $_GET['immat'];
 }
 $v = ModelVoiture::getVoitureByImmat($i); //appel au modèle pour gerer la BD
 if($v != null)
    require ('../view/voiture/detail.php'); //"redirige" vers la vue
 else
    require ('../view/voiture/error.php'); //"redirige" vers la vue
 }
 
  public static function create() {
    require ('../view/voiture/formulaireVoiture.html'); //"redirige" vers la vue
 }
 
   public static function created() {
      if(isset($_POST['Immatriculation']) && isset($_POST['Couleur']) && isset($_POST['Marque'])){
          ModelVoiture::save($_POST['Marque'],$_POST['Couleur'],$_POST['Immatriculation']);
          
      }
    require ('../view/voiture/formulaireVoiture.html'); //"redirige" vers la vue
 }
}
