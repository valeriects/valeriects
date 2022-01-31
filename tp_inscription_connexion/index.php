<?php
    session_start();
?>

<style type="text/css">
    <?php include 'style.php'; ?>
</style>
   
   
<?php
    echo ' <main id="img">';

    echo '<div class="titre"><h2>Bienvenue</h2><h4>Choisissez un moyen de connexion</h4><div class="boutonIndex"><a href="inscription.php"><button class="inscription">Inscription</button></a>
    <a href="connecte.php"><button class="connecte">Connexion</button></a></div></div>';

    echo '</main>';

    session_destroy();
?>
