<?php

    require_once './model.php';
    
    
class voiture {


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
        return $this->marque;
    }


    public function setCouleur($couleur) {
        
        
        $this->couleur = $couleur;
        
        
    }
    
    
    public function getImmatriculation() {
        return $this->marque;
    }

    public function setImmatriculation($immatriculation) {
        if(strlen($immatriculation) > 8){
            $immatriculation = substr($immatriculation,0,8);
        }
        $this->immatriculation = $immatriculation;
    }
    
    
    
    
    
    public static function getAllVoiture() {
        $rep = Model::$pdo->query("Select * FROM voiture");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'Voiture');
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
    public function afficher() {
        echo $this->marque."<br>";
        echo $this->couleur."<br>";
        echo $this->immatriculation."<br>";





    }
    
}