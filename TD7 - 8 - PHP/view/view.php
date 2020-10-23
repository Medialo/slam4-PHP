<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $pagetitle; ?></title>
    </head>

    <header>

        <ul>
            <li> <a href="index.php?action=readall">Lire tout</a> </li>
            <li> <a href="index.php?action=readall&controller=utilisateur" > lire tout les users </a> </li>
            <li> <a href="index.php?action=readall&controller=trajet"> lire tout les trajets</a> </li>

        </ul>

        <ul>
            <?php if(!isset($_SESSION['login']) ): ?>
            <li> <a href="index.php?action=connect&controller=utilisateur" > Connexion </a> </li>

            <?php else: ?>
            <li> Bonjour </li>
            <li> <a href="index.php?action=disconnect&controller=utilisateur" > Déconnexion </a> </li>
           <?php endif; ?>

        </ul>
    </header>

    <body>
        <h1><?php echo $pagetitle; ?></h1>
        <?php
// Si $controleur='voiture' et $view='list',
// alors $filepath="/chemin_du_site/view/voiture/list.php"
        $filepath = File::build_path(array("view", $controller, "$view.php"));
        require $filepath;
        ?>
    </body>

    <footer>
        <p style="border: 1px solid black;text-align:right;padding-right:1em;">
            Site de covoiturage de ...
        </p>

    </footer>
