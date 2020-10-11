<?php

require('../config/conf.php');

class Model {
    
    public static $pdo;
    
    public static function init(){
        try {
               self::$pdo = new PDO('mysql:host='.Conf::getHost().';dbname='.Conf::getDataBase(), Conf::getLogin(), Conf::getPassword(),array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
               
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

 }


Model::init();