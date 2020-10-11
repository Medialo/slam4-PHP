<?php

    
    
    
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
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    // un constructeur
    public function __construct($m, $c, $i) {
        $this->marque = $m;
        $this->couleur = $c;
        $this->immatriculation = $i;
    }

    // une methode d'affichage.
    public function afficher() {
        echo $this->marque."<br>";
        echo $this->couleur."<br>";
        echo $this->immatriculation."<br>";





    }
    
}