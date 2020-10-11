<?php
    require_once './model.php';
class trajet {
    
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

    function __construct($id= NULL, $pointDeDepart= NULL, $pointDarriver= NULL, $detail= NULL, $prix= NULL, $conducteur_login= NULL) {
         if(!is_null($id) && !is_null($pointDeDepart) && !is_null($pointDarriver) && !is_null($detail) && !is_null($prix) && !is_null($conducteur_login)){
        $this->id = $id;
        $this->pointDeDepart = $pointDeDepart;
        $this->pointDarriver = $pointDarriver;
        $this->detail = $detail;
        $this->prix = $prix;
        $this->conducteur_login = $conducteur_login;
    }}

            public static function getAllTrajet() {
        $rep = Model::$pdo->query("Select * FROM trajet");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'trajet');
        return $rep->fetchAll();
    }

        public function afficher() {
        echo $this->id."<br>";
        echo $this->pointDeDepart."<br>";
        echo $this->pointDarriver."<br>";
echo $this->prix."<br>";
echo $this->conducteur_login."<br>";


    }
}