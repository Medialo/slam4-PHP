<?php

class trajet {
    
    private $id;
    private $pointDeDepart;
    private $pointDarriver;
    private $detail;
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

    function getDetail() {
        return $this->detail;
    }

    function getPrix() {
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

    function setDetail($detail): void {
        $this->detail = $detail;
    }

    function setPrix($prix): void {
        $this->prix = $prix;
    }

    function setConducteur_login($conducteur_login): void {
        $this->conducteur_login = $conducteur_login;
    }


    
}