<?php
$title = "Ajout rendez-vous";

ob_start();


echo '<main id="ajoutRdv">';

echo $form->build();

if (!isset($_POST['idPatients'], $_POST['datetime'])) {
    echo '<div class=rdv>Veuillez entrer le rendez_vous.</div><br>';
} else {
    echo '<div class=rdv>Félicitations, vous avez bien entrée le rendez-vous du patient.</div><br>';
}


echo '<div class="btn">';
// bouton par aller a la liste rendezvous:
echo '<a href="./index.php?action=listeRdv"><button class="liste">Liste Rendez-vous</button></a>';

// bouton par aller a l'index':
echo '<a href="./index.php?action=accueil"><button class="liste">Accueil</button></a';

echo '</div>';

echo '</main>';

$content = ob_get_clean();

require './view/template.php';
