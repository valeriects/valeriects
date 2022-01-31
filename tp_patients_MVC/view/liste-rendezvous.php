<?php $title = "Liste rendez-vous"; 

ob_start();

echo '<main id="listeRdv">';

echo '<div class="cadre">';


// j'affiche un echo d'un tableau, et de la premièree ligne de celui-ci, c-a-d les titres:
echo "<table>
        <tr>
        <th>ID Patient</th>
        <th>Date et horaire</th>
        <th>Rendez-vous</th>
        <th>Modifie</th>
        <th>Supprime</th>
        </tr>";

// à l'intérieur du tableau balise hmtl, je fait un foreach pour récupérer les données du fetchAll()
foreach ($table as $ligne) {

        echo '<tr>
            <td>' . $ligne['idPatients'] . '</td>
            <td>' . $ligne['dateHour'] . '</td>
            <td><a href ="./index.php?id=' . $ligne['id'] . '&action=rdv"><button>RDV</button></a></td>
            <td><a href="./index.php?id=' . $ligne['id'] . '&action=rdv"><button>Modifier</button></a></td>
            <td><a href="./index.php?id=' . $ligne['id'] . '&action=listeRdv"><button name="sup">Supprimer</button></a></td>
            </tr>';
}
// enfin en dehors du foreach, on ferme le tableau avec la balise </table>
echo "</table><br>";

echo '</div>';

echo '<div class="btn">';
// bouton par aller a la ajout patient:
echo '<a href="./index.php?action=ajoutRdv"><button class="liste">Ajouter Rendez-vous</button></a>';

// bouton par aller a l'index':
echo '<a href="./index.php?action=accueil"><button class="liste">Accueil</button></a>';

echo '</div>';
echo '</main>';

$content = ob_get_clean();

require './view/template.php';
