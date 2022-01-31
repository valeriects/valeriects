<?php
session_start();

/********* les define ont toutes été mise dans le fichier database.php
 ainsi que les variables, la $Database = new PDO(), et les fonctions de nettoyages et le stockage des $_POST dans les vatiables ************/

include_once('database.php');


if ($_POST['pseudo'] && $_POST['password']) {


    // on ne met pas le password_client avant le from car on ne va pas demander cette donnée ici mais après le where pour pouvoir faire une comparaison:
    $prepare = $Database->prepare('SELECT nom_client, pseudo_client FROM client WHERE pseudo_client=? AND password_client=?');
    $prepare->execute(array($pseudo, sha1($password)));

    $userData = $prepare->fetch();
    if ($prepare->rowcount() == 1) {

        // pour pouvoir afficher la variable nom dans le login.php, j'ai besoin d'y avoir accès, et le mettre dans le SELECT pour avoir le $nom à l'indice [0]
        $nom = $userData[0];

        $_SESSION['ok'] = 'Vous avez entrée les bonnes données. <br>';

        $_SESSION['infoLogin'] = '<div>Votre nom : ' . $nom . '</div><div>Votre pseudo : ' . $pseudo . '</div><br>';
        // on a pas besoin du password et si on veut afficher le password hashé, on mettrait sha1($password)
        // $_SESSION['infoLogin'] = '<div><div>Votre nom : '.$nom.'</div><div>Votre pseudo : '.$pseudo.'</div><div>Votre mot de passe : '.$password.'</div><br>';

        header('Location: /php-test1/php_commencement_septembre/PDO/exo_inscription/login.php');
    } else {
        $_SESSION['erreur24'] = "Votre pseudo : '$pseudo' ou votre mot de passe : '$password' ne sont pas valides";
        header('Location: /php-test1/php_commencement_septembre/PDO/exo_inscription/connecte.php');
    }
} else {
    $_SESSION['erreurConnexion'] = "Vous n'avez pas utilisé tous les champs requis. <br>";
    header('Location: /php-test1/php_commencement_septembre/PDO/exo_inscription/connecte.php');
}
