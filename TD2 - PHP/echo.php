<!DOCTYPE html>
<?php 
        include('voiture.php');
?>
<html>
    <head>
        <meta charset="utf-8" />
        <title> Mon premier php </title>
    </head>

    <body>
        Voici le résultat du script PHP :
        <?php

        $marque = "tesla";
        $couleur = "rouge";
        $immatriculation = "4zef35ze4f";

        $voiture =[
            "marque" => "tesla",
            "couleur" => "rouge",
            "imma" => "lzrgbmlzrgmz"
        ];


        $list = [ [
            "marque" => "tesla",
            "couleur" => "rouge",
            "imma" => "lzrgbmlzrgmz"
        ],[
            "marque" => "tesla",
            "couleur" => "rouge",
            "imma" => "lzrgbmlzrgmz"
        ],[
            "marque" => "tesla",
            "couleur" => "rouge",
            "imma" => "lzrgbmlzrgmz"
        ]];



        var_dump($voiture);

        // Ceci est un commentaire PHP sur une ligne
        /* Ceci est le 2ème type de commentaire PHP
 sur plusieurs lignes */

        // On met la chaine de caractères "hello" dans la variable 'texte'
        // Les noms de variable commencent par $ en PHP
        $texte = "hello world !";
        // On écrit le contenu de la variable 'texte' dans la page Web
        echo $texte;
        ?>
        <p> Voiture <?= $marque ?> de marque <?= $immatriculation ?> (couleur <?= $couleur ?>) </p>




        <p> Voiture <?= $voiture['marque'] ?> de marque <?= $voiture['imma'] ?> (couleur <?= $voiture['couleur'] ?>) </p>


       
            
        <?php 
    if(empty($list)){
        echo " pas de voiture dans la liste";
    }else {
        foreach ($list as $value){
    
      ?>

            <ul>
                <li><?= $value['marque'] ?></li>
                <li><?= $value['couleur'] ?></li>
                <li><?= $value['imma'] ?></li>

            </ul>
            <?php }} ?>
        
        
        
        
        <?php 
//        require 'voiture.php';
            
    

        $v1 = new voiture("renault","blanc","6f5ez4fz5e");
        $v1->afficher();
        
        
        ?>
        
        
        

    </body>
</html>