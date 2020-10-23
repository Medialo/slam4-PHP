<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        //require_once 'Voiture.php';
        require (File::build_path(["model",'modelVoiture.php']));
        $tab_v = ModelVoiture::getAllVoitures();
        foreach ($tab_v as $v)
            $v->afficher();
        ?>
    </body>
</html>