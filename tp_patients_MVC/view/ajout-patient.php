<?php 
$title = "Ajout patient";  

// début mémoire tampon
ob_start(); 


echo '<main id="ajoutPatient">';
// je fais echo pr afficher la fonction de construction de mon formulaire.
echo $form->build();
/***** FIN du FORMULAIRE *******/


// devrait afficher si je suis inscrit ou bien l'erreur, mais l'erreur s'affiche tout le temps...
if (isset($_SESSION['good'])) {
    echo '<div class="okPatient">' . $_SESSION['good'] . '</div>';
}

if (isset($_SESSION['errorAjout'])) {
    echo '<div class="red">' . $_SESSION['errorAjout'] . '</div>';
}


echo '<div class="btn">';
// bouton par aller a la liste patient:
echo '<a href="./index.php?action=listePatient"><button class="liste">Liste Patient</button></a>';

// bouton par aller a l'index':
echo '<a href="./index.php?action=accueil"><button class="liste">Accueil</button></a';
echo '</div>';
echo '</main>';

$content = ob_get_clean(); ?>


<!-- on fait le require ici -->

<?php require './view/template.php'; ?>