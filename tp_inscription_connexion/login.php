<?php
    session_start();
?>

<style type="text/css">
    <?php include 'style.php'; ?>
</style>

<title>Login</title>

<?php
    echo '<main  id="log">';
    
    if(isset($_SESSION['ok'])) {
        echo '<div class="user bon">'.$_SESSION['ok'].'</div>';
    }

    echo '<div class="bord">';

    if(isset($_SESSION['infoLogin'])) {
        echo '<div class="user cadre">'.$_SESSION['infoLogin'].'</div>';
    }

    echo '</div>';

    echo ' <a href="index.php"><button class="deconn">Déconnexion</button></a>';

    echo '</main>';

    session_destroy();

?>
            