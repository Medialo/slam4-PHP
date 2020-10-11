<?php

//require_once 'Model.php';
require_once (File::build_path(["model",'Model.php']));
class ModelVoiture {

    private $marque;
    private $couleur;
    private $immatriculation;

    // un getter
    public function getMarque() {
        return $this->marque;
    }

    // un setter
    public function setMarque($marque) {
        $this->marque = $marque;
    }

    public function getCouleur() {
        return $this->couleur;
    }

    public function setCouleur($couleur) {


        $this->couleur = $couleur;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }

    public function setImmatriculation($immatriculation) {
        if (strlen($immatriculation) > 8) {
            $immatriculation = substr($immatriculation,0,8);
        }
        $this->immatriculation = $immatriculation;
    }

    public static function getAllVoitures() {
        $rep = Model::$pdo->query("Select * FROM voiture");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        return $rep->fetchAll();
    }

    // un constructeur
    public function __construct($m = NULL, $c = NULL, $i = NULL) {
        if (!is_null($m) && !is_null($c) && !is_null($i)) {
            $this->marque = $m;
            $this->couleur = $c;
            $this->immatriculation = $i;
        }
    }

    // une methode d'affichage.
  /*  public function afficher() {
        echo $this->marque . "<br>";
        echo $this->couleur . "<br>";
        echo $this->immatriculation . "<br>";
    }
   */

    public static function getVoitureByImmat($immat) {
        $sql = "SELECT * from voiture WHERE immatriculation=:nom_tag";
        // Pr�paration de la requ�te
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $immat,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on ex�cute la requ�te
        $req_prep->execute($values);
        // On r�cup�re les r�sultats comme pr�c�demment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de r�sultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    public static function save($m, $c, $i): void {
        $sql = "INSERT INTO voiture VALUES (:marque, :couleur, :imma);";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "marque" => $m,
            "couleur" => $c,
            "imma" => $i,
        );
        $req_prep->execute($values);
    }

    public static function deleteByImmat($immatriculation)
    {
        $sql = "DELETE FROM voiture WHERE voiture.immatriculation = :imma;";
        $req_prep = Model::$pdo->prepare($sql);
        $value = array(
            "imma" => $immatriculation,
        );
        $req_prep->execute($value);
    }

   /* 
        function getVoitureByImmat2($immat) {
        $sql = "SELECT * from voiture2 WHERE immatriculation='$immat'";
        $rep = Model::$pdo->query($sql);
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
        return $rep->fetch();
    }
*/
    
}
