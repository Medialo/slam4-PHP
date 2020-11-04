<?php
//Permet de require des fichiers plus simplement via un tableau
// l'adresse du fichier d'origine et automatiquement gérer par PHP
// cela permet donc de changer notre site de serveur sans avoir
// à modifier tous les liens vers des fichiers
class File{
    const DS = DIRECTORY_SEPARATOR;
    const ROOT_FOLDER = __DIR__.self::DS."..";
    public static function build_path($path_array) {
        return self::ROOT_FOLDER.self::DS. join(self::DS, $path_array);
    }
}