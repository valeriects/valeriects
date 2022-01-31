<?php
    session_start();
?>

<style type="text/css">
    <?php
     include 'style.php'; 
     ?>
</style>

<title>Incsription</title>

<?php
// la version avec le css en format fichier php

    include './formulaire/Form.php';

    $action = "traitementInscription.php";
    $method = "post";
    $id = 'inscription';

    $form = new Form($action, $method, $id);
    $form
        ->addTextField('nom', 'text', '', 'Votre nom')
        ->addTextField('pseudo', 'text', '', 'Votre pseudo')
        ->addTextField('password', 'password', '', '8 caractères : min, maj, num et caract spéciaux')
        ->addSubmitButton('Inscription');

    echo '<main id="imgconnect">';
    echo $form->build();

    if(isset($_SESSION['erreurInscription'])) {
        echo '<div class="red">'.$_SESSION['erreurInscription'].'</div>';
    }

    if(isset($_SESSION['erreur1'])) {
        echo '<div class="red">'.$_SESSION['erreur1'].'</div>';
    }

    echo ' <a href="index.php"><button class="index">Accueil</button></a>';
    echo '</main>';
    
    session_destroy();
?>