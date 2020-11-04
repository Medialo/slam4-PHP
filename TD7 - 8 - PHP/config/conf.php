<!--

    function __construct(){
        $dbh = new PDO('mysql:host=localhost;dbname=test', "root", "");
        
    }
    
-->


<?php

/**
 * 
 *  Class qui contient le tableau des paramétres de connexion pour la base de données
 * 
 */
class Conf {

 static private $debug = True; 
    
//    tableau qui contient tous les paramètres pour se connecter à la base de données
 static private $databases = array(

 'hostname' => 'localhost',

 'database' => 'phptd2slam4',

 'login' => 'root',

 'password' => ''
 );

    
// GETTER pour obtenir un paramètre précis du tableau précédent    
    
 static public function getLogin() {
 //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
 return self::$databases['login'];
 }
 
  static public function getPassword() {
 return self::$databases['password'];
 }
 
  static public function getDataBase() {
 return self::$databases['database'];
 }
 
  static public function getHost() {
 return self::$databases['hostname'];
 }
 
 static public function getDebug() {
 return self::$debug;
 }

}
?>