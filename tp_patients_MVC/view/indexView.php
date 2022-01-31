<?php
$title = "Application Hopital";

ob_start();


echo '<main id="tout">';

// uniquement le bouton Nouveau patient
echo "<a href='./index.php?action=ajoutPatient'><button class='liste'>Nouveau Patient</button></a><br>";
//    bouton rendez-vous:
echo "<a href='./index.php?action=ajoutRdv'><button class='liste'>Nouveau Rendez-vous</button></a><br>";

echo '</main>';

$content = ob_get_clean(); ?>


<!-- on fait le require ici -->

<?php require './view/template.php'; ?>