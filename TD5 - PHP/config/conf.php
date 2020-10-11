<!--

    function __construct(){
        $dbh = new PDO('mysql:host=localhost;dbname=test', "root", "");
        
    }
    
-->


<?php
class Conf {

 static private $debug = True; 
    
 static private $databases = array(

 'hostname' => 'localhost',

 'database' => 'phptd2slam4',

 'login' => 'root',

 'password' => ''
 );

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