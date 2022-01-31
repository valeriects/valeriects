<?php
$title = "Profil patient";

ob_start();



echo '<main id="profilPatient">';


if ($table) {
    // j'affiche la table et les titres de mon tableau
    echo "<table><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Date naissance</th><th>Téléphone</th><th>Email</th></tr>";
    
    echo '<tr><td>' . $table['id'] . '</td><td>' . $table['lastname'] . '</td><td>' . $table['firstname'] . '</td><td>' . $table['birthdate'] . '</td><td>' . $table['phone'] . '</td><td>' . $table['mail'] . '</td></tr>';

    // je ferme ma table (visuellement)
    echo "</table>";
}

if (!empty($horaire)) {

    echo '<div class="rdv">Patient : ' . $horaire['lastname'] . ' ' . $horaire['firstname'] . '<br>RDV : ' . $horaire['dateHour'] . '<br>
                    </div>';
} else {
    echo '<div class="err">Il n\'y a pas de RDV de prévu.</div><br>';
}

// je fais echo pr afficher la fonction de construction de mon formulaire.
echo $form->build();
/***** FIN du FORMULAIRE *******/

echo '<div class="btn">';
// bouton pour aller à la liste patient:
echo '<a href="./index.php?action=listePatient"><button class="liste">Liste patient</button></a><br>';
echo '<div class="btn">';

echo '</main>';

$content = ob_get_clean(); ?>


<!-- on fait le require ici -->

<?php require './view/template.php'; ?>