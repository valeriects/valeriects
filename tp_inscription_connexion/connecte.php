<?php
    session_start();
?>

<style type="text/css">
    <?php 
    include 'style.php';
     ?>
</style>

<title>connexion</title>
<?php
// la version avec le css en format fichier php
    include './formulaire/Form.php';
    
    $action = "traitementConnecte.php";
    $method = "post";
    $id = 'inscription';

    $form = new Form($action, $method, $id);
    $form
        ->addTextField('pseudo', 'text', '', 'Votre pseudo')
        ->addTextField('password', 'password', '', '8 caractères : min, maj, num et caract spéciaux')
        ->addSubmitButton('Connexion');

    echo '<main id="imgconnect">';
    echo $form->build();
    if(isset($_SESSION['erreurConnexion'])) {
        echo '<div class="red">'.$_SESSION['erreurConnexion'].'</div>';
    }
    if(isset($_SESSION['erreur22'])) {
        echo '<div class="red">'.$_SESSION['erreur22'].'</div>';
    }
    if(isset($_SESSION['erreur23'])) {
        echo '<div class="red">'.$_SESSION['erreur234'].'</div>';
    }
    if(isset($_SESSION['erreur24'])) {
        echo '<div class="red">'.$_SESSION['erreur24'].'</div>';
    }
    echo ' <a href="index.php"><button class="index">Accueil</button></a>';
    echo '</main>';

    session_destroy();
?>
