<?php
$title = "Rendez-vous"; 

ob_start();


echo '<main id="rdv">';

if ($info) {
    // j'affiche la table et les titres de mon tableau
    echo "<table><tr><th>ID du patient</th><th>Date et horaire</th></tr>";

    echo '<tr>
        <td>' . $info['idPatients'] . '</td>
        <td>' . $info['dateHour'] . '</td>
        </tr>';

    // je ferme ma table (visuellement)
    echo "</table>";
}


// le formulaire sous forme de class
echo '<div class="affichageIdP"> L\'ID de votre Patient est :' . $info['idPatients'] . '  </div>';

echo $form->build();
// fin du formulaire


echo '<div class="btn">';
// bouton pour aller à la liste patient:
echo '<a href="./view/liste-rendezvous.php"><button class="liste">Liste Rendez-vous</button></a><br>';
echo '</div>';

echo '</main>';

$content = ob_get_clean(); ?>


<!-- on fait le require ici -->

<?php require './view/template.php'; ?>