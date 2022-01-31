<?php $title = "Liste patient";

ob_start();

echo '<main id="listePatient">';

echo '<div class="cadre">';


// j'affiche un echo d'un tableau, et de la premièree ligne de celui-ci, c-a-d les titres:
echo "<table><tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Date naissance</th><th>Profil</th><th>Modifie</th><th>Supprimer</th></tr>";

// var_dump($table);
// à l'intérieur du tableau balise hmtl, je fait un foreach pour récupérer les données du fetchAll()
foreach ($table as $ligne) {

    echo '<tr><td>' . $ligne['id'] . '</td><td>' . $ligne['lastname'] . '</td><td>' . $ligne['firstname'] . '</td><td>' . $ligne['birthdate'] . '</td><td><a href =" ./index.php?id=' . $ligne['id'] . '&action=profilPatient"><button>Profil</button></a></td><td><a href=" ./index.php?id=' . $ligne['id'] . '&action=profilPatient"><button>Modifier</button></a></td><td><a href=" ./index.php?id=' . $ligne['id'] . '& action=listePatient"><button name="sup">Supprimer</button></a></td></tr>';
}
// enfin en dehors du foreach, on ferme le tableau avec la balise </table>
echo "</table><br>";

echo '</div>';

echo '<div class="btn">';
// bouton par aller a la ajout patient:
echo '<a href="./index.php?action=ajoutPatient"><button class="liste">Ajouter patient</button></a>';

// bouton par aller a l'index':
echo '<a href="./index.php?action=accueil"><button class="liste">Accueil</button></a>';
echo '</div>';

echo '</main>';

$content = ob_get_clean(); ?>


<!-- on fait le require ici -->

<?php require './view/template.php'; ?>