<?php

//require_once 'Model.php';
require_once (File::build_path(["model", 'Model.php']));


class ModelUtilisateur extends Model {

    protected static $obj = "Utilisateur";      //Représente le nom des objets coté serveur PHP
    protected static $primary_key = "login";    //Nom du champ de la clef primaire sur la base de donnée
    protected static $table = "utilisateur";    //Nom de la table dans la BDD qui contient les utilisateurs
    
    private $login; //  
    private $name;  //  
    private $fname; //
    private $mdp;   //     Représente les attributs d'un utilisateurs
    private $admin; //
    private $email; //
    private $nonce; //
    
    
    /**
     * GETTER et SETTER permettant d'acceder aux attributs d'une instance d'utilisateur
     */
    function getNonce() {
        return $this->nonce;
    }

    function setNonce($nonce): void {
        $this->nonce = $nonce;
    }
    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email): void {
        $this->email = $email;
    }

    public function getAdmin() {
        return $this->admin == "1" ? true : false;
    }

    private function getMdp() {
        return $this->mdp;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getName() {
        return $this->name;
    }

    public function getFname() {
        return $this->fname;
    }

    public function setLogin($l) {
        $this->login = $l;
    }

    public function setName($n) {
        $this->name = $m;
    }

    public function setFname($fn) {
        $this->fname = $fn;
    }

    public static function isAdmin($login) {
        $user = static::select($login);
        return $user->getAdmin();
    }

    public static function getAllUtilisateurs() {
        $rep = Model::$pdo->query("Select * FROM utilisateur");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        return $rep->fetchAll();
    }

    // un constructeur qui par défaut set tous les champs à null pour permetre de créer manuellement ou via php des instance d'utlisateur 
    public function __construct($l = NULL, $n = NULL, $fn = NULL, $mdp = NULL, $admin = NULL, $email = NULL, $nonce = NULL) {
        if (!is_null($l) && !is_null($n) && !is_null($fn) && !is_null($mdp) && !is_null($admin) && !is_null($email) && !is_null($nonce)) {
            $this->login = $l;
            $this->name = $m;
            $this->fname = $fn;
            $this->mdp = $mdp;
            $this->admin = $admin;
            $this->email = $email;
            $this->nonce = $nonce;
        }
    }

    // une methode d'affichage.
    /*  public function afficher() {
      echo $this->marque . "<br>";
      echo $this->couleur . "<br>";
      echo $this->immatriculation . "<br>";
      }
     */


     //Ancienne méthode qui permet de récuperer des utilisateur via leur login
    public static function getUtilisateurByLogin($login) {
        $sql = "SELECT * from utilisateur WHERE login=:nom_tag LIMIT 1";// on écrit la requete SQL
        // Pr�paration de la requ�te
        $req_prep = Model::$pdo->prepare($sql); // on la préapre pour éviter les injections SQL
        $values = array(
            "nom_tag" => $login,                // on donne au parametre le login de l'utlisateur
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on ex�cute la requ�te
        $req_prep->execute($values);
        // On r�cup�re les r�sultats comme pr�c�demment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
        $tab_voit = $req_prep->fetchAll();
        // Attention, si il n'y a pas de r�sultats, on renvoie false
        if (empty($tab_voit))
            return false;
        return $tab_voit[0];
    }

    /*   public static function save($l, $n, $fn): void {
      $sql = "INSERT INTO utilisateur VALUES (:login, :name, :fname);";
      $req_prep = Model::$pdo->prepare($sql);
      $values = array(
      "login" => $l,
      "name" => $n,
      "fname" => $fn,
      );
      $req_prep->execute($values);
      } */

    public static function deleteByLogin($login) {
        $sql = "DELETE FROM utilisateur WHERE utilisateur.login = :login ;";
        $req_prep = Model::$pdo->prepare($sql);
        $value = array(
            "login" => $login,
        );
        $req_prep->execute($value);
    }

    public static function checkPassword($login, $mdp) {
        $user = static::select($login); // on récupère l'utilisateur
        return $user != false ? $user->getMdp() == $mdp : false; // on vérfie si son mot de passe est le même qui celui donné en parametre 
    }

    public static function checkNonce($login) {
        $user = static::select($login); // on récupère l'utilisateur
        return $user->getNonce() == NULL ? true : false; // on vérfie si l"utilisateur à un nonce si oui alors on renvoie true
    }


    /*    public static function update($l, $n, $fn){
      $sql = "UPDATE `utilisateur` SET `fname` = :fname, `name` = :name WHERE `utilisateur`.`login` = :login ";
      $values = array(
      "login" => $l,
      "name" => $n,
      "fname" => $fn,
      );

      $req_prep = Model::$pdo->prepare($sql);
      $req_prep->execute($values);
      } */

    /*
      function getUtilisateurByImmat2($immat) {
      $sql = "SELECT * from utilisateur2 WHERE immatriculation='$immat'";
      $rep = Model::$pdo->query($sql);
      $rep->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
      return $rep->fetch();
      }
     */
}
