 

<?php
if (isset($v)) {
    echo '<p> ID : ' . htmlspecialchars($v->getID()) . '.</p>';
    echo '<p> Point de départ : ' . htmlspecialchars($v->getPointDeDepart()) . '.</p>';
    echo '<p> Point de d\'arriver : ' . htmlspecialchars($v->getPointDarriver()) . '.</p>';
    echo '<p> Date : ' . htmlspecialchars($v->getDatet()) . '.</p>';
    echo '<p> Nombre de place : ' . htmlspecialchars($v->getNbPlaces()) . '.</p>';
    echo '<p> Prix : ' . htmlspecialchars($v->getPrice()) . '.</p>';
    echo '<p> Conducteur : ' . htmlspecialchars($v->getConducteur_login()) . '.</p>';
}
?>

<a href="index.php?action=delete&id=<?= urlencode($v->getId()) ?>&controller=trajet" >Supprimer l'utilisateur</a>
<a href="index.php?action=update&id=<?= urlencode($v->getId()) ?>&controller=trajet" >Modifier l'utlisateur</a>