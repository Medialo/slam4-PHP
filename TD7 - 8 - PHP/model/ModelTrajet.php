<?php

//require_once 'Model.php';
require_once (File::build_path(["model", 'Model.php']));

/**
 * 
 *      Seul le model "ModelUtilisateur" ainsi que la class "Model" seront commentés 
 *      car il s'agit des mêmes méthodes/fonctions pour tous les modeles !
 * 
 */

class ModelTrajet extends Model {

    protected static $obj = "Trajet";
    protected static $primary_key = "id";
    protected static $table = "trajet";
    
    private $id;
    private $pointDeDepart;
    private $pointDarriver;
    private $datet;
    private $nbplaces;
    private $prix;
    private $conducteur_login;

    function getId() {
        return $this->id;
    }

    function getPointDeDepart() {
        return $this->pointDeDepart;
    }

    function getPointDarriver() {
        return $this->pointDarriver;
    }

    function getDatet() {
        return $this->datet;
    }

    function getNbPlaces() {
        return $this->nbplaces;
    }

    function getPrice() {
        return $this->prix;
    }

    function getConducteur_login() {
        return $this->conducteur_login;
    }

    function setId($id): void {
        $this->id = $id;
    }

    function setPointDeDepart($pointDeDepart): void {
        $this->pointDeDepart = $pointDeDepart;
    }

    function setPointDarriver($pointDarriver): void {
        $this->pointDarriver = $pointDarriver;
    }

    function setDatet($datet): void {
        $this->datet = $datet;
    }

    function setNbPlaces($nbplaces): void {
        $this->nbplaces = $nbplaces;
    }

    function setPrice($prix): void {
        $this->prix = $prix;
    }

    function setConducteur_login($conducteur_login): void {
        $this->conducteur_login = $conducteur_login;
    }

// un constructeur
    function __construct($id = NULL, $pointDeDepart = NULL, $pointDarriver = NULL, $datet = NULL, $nbplaces = NULL, $prix = NULL, $conducteur_login = NULL) {
        if (!is_null($id) && !is_null($pointDarriver) && !is_null($pointDeDepart) && !is_null($datet) && !is_null($nbplaces) && !is_null($prix) && !is_null($conducteur_login)) {
            $this->id = $id;
            $this->pointDeDepart = $pointDeDepart;
            $this->pointDarriver = $pointDarriver;
            $this->datet = $datet;
            $this->nbPlaces = $nbplaces;
            $this->price = $prix;
            $this->conducteur_login = $conducteur_login;
        }
    }

}
