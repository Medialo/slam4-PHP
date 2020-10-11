<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Liste des voitures</title>
    </head>
    <body>
        <?php
        require_once 'Voiture.php';
        $tab_v = Voiture::getAllVoitures();
        foreach ($tab_v as $v)
            $v->afficher();
        ?>
    </body>
</html>