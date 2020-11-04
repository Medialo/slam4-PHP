<?php

//require('../config/conf.php');
require (File::build_path(["config", 'conf.php']));

class Model {

    public static $pdo;
       // protected static $table = 'voiture';

       /**
        *   Méthode qui permet d'initaliser la connexion à la base de données avec les paramètres présents dans la fichier configuration.
        */
    public static function init() {
        try {
            self::$pdo = new PDO('mysql:host=' . Conf::getHost() . ';dbname=' . Conf::getDataBase(), Conf::getLogin(), Conf::getPassword(), array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    /**
     *  Fonction qui retourne un table de tous les objets de la table précisé par un model qui hérite de Model()
     */
    public static function selectAll() {
        $table_name = static::$obj;
        $class_name = "Model" . $table_name;
        $rep = Model::$pdo->query("Select * FROM " . $table_name);
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        return $rep->fetchAll();
    }

    /**
     *  Fonction qui retourne un seul objet de la table précisé par l'enfant en fonction d'une seul clef primaire
     */
    public static function select($key) {

        $table_name = static::$obj;
        $class_name = "Model" . $table_name;
        $primary_key_name = static::$primary_key;



        $sql = "SELECT * from " . $table_name . " WHERE " . $primary_key_name . "=:nom_tag LIMIT 1";
        // Prï¿½paration de la requï¿½te
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom_tag" => $key,
                //nomdutag => valeur, ...
        );
        // On donne les valeurs et on exï¿½cute la requï¿½te
        $req_prep->execute($values);
        // On rï¿½cupï¿½re les rï¿½sultats comme prï¿½cï¿½demment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab = $req_prep->fetchAll();
        // Attention, si il n'y a pas de rï¿½sultats, on renvoie false
        if (empty($tab)) {
            return false;
        }
        return $tab[0];
    }

    /**
     *  Méthode qui supprime un object d'une table en lui donnant une valeur de clef primaire
     */
    public static function delete($key) {

        $table_name = static::$obj;
        //$class_name = "Model".$table_name;
        $primary_key_name = static::$primary_key;


        $sql = "DELETE FROM " . $table_name . " WHERE " . $primary_key_name . " = :key ;";
        $req_prep = Model::$pdo->prepare($sql);
        $value = array(
            "key" => $key,
        );
        $req_prep->execute($value);
    }

    /**
     *  Méthode qui met à jour dans la table une occurence en fonction d'une valeur de clef primaire ainsi qu'un tableau de "attributs" => "valeur"
     */
    public static function update($primary_key_value, $tab) {
        $tablee = static::$table;
        $primary_key_name = static::$primary_key;
        $sql = "UPDATE ".$tablee." SET ";
        $values = array();
        
        foreach($tab as $key => $value){
            $sql.="`".$key."` = :".$key.",";
            $values[$key] = $value;
        }
       $sql = rtrim($sql,',');
       $sql .= " WHERE `".$tablee."`.`".$primary_key_name."` = :key ";
      
       $values['key'] = $primary_key_value;
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute($values);
    }
    
    
    
       public static function save($tab) {
        $tablee = static::$table;
        $primary_key_name = static::$primary_key;
     //   INSERT INTO `utilisateur` (`login`, `name`, `fname`) VALUES ('uj', 'ryu', 'ru')
        $sql = "INSERT INTO ".$tablee." (";
        $values = array();
        foreach($tab as $key => $value){
            $sql.="`".$key."`,";
            $values[$key] = $value;
        }
        $sql = rtrim($sql,',');
        $sql.=") VALUES (";
        foreach($tab as $key => $value){
            $sql.=":".$key.",";
        }
       $sql = rtrim($sql,',');
       $sql .= ")";

       
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute($values);
    }

    /* public static function read($controller) {

      } */
}

Model::init();