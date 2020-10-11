<?php
    require_once './model.php';
class user {
    
    private $login;
    private $name;
    private $fname;
    
    
    
    
    
    function getLogin() {
        return $this->login;
    }

    function getName() {
        return $this->name;
    }

    function getFname() {
        return $this->fname;
    }

    function setLogin($login): void {
        $this->login = $login;
    }

    function setName($name): void {
        $this->name = $name;
    }

    function setFname($fname): void {
        $this->fname = $fname;
    }

    function __construct($login = NULL, $name = NULL, $fname = NULL) {
        if(!is_null($login) && !is_null($name) && !is_null($fname)){
            $this->login = $login;
            $this->name = $name;
            $this->fname = $fname;
        }
    }

    public static function withTab($tab) : this {
        $v = new self();
        $v->setLogin($tab['login']);
        $v->setName($tab['name']);
        $v->setFname($tab['fname']);
        return $v;
    }
    
        public static function getAllUser() {
        $rep = Model::$pdo->query("Select * FROM users");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'user');
        return $rep->fetchAll();
    }
    
            public function afficher() {
        echo $this->login."<br>";
        echo $this->name."<br>";
        echo $this->fname."<br>";



    }
    
}



