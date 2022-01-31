<?php
    session_start();


/********* les define ont toutes été mise dans le fichier database.php
 ainsi que les variables, la $Database = new PDO(), et les fonctions de nettoyages et le stockage des $_POST dans les vatiables ************/

    include_once('database.php');
   


    // code pour comparare si on a le meme pseudo deja dans la base de données:
    $prep = $Database->prepare('SELECT nom_client, pseudo_client FROM client WHERE pseudo_client=?');

    $prep->execute(array($pseudo));

    $tableau = $prep->fetchAll();
    // print_r($tableau);
    var_dump($tableau);
   
    // je le mets là car mon SELECT et le FETCH qui en découle vont en avoir besoin:
    
    if($pseudo === $tableau[0]["pseudo_client"]) {

        $_SESSION['erreur1'] = 'Votre pseudo est déjà prit, essayez-s\'en un autre.';
        header('Location: /php-test1/php_commencement_septembre/PDO/exo_inscription/inscription.php');
        // pour arreter :
        exit;
    }
    //FIN code pour comparare si on a le meme pseudo deja dans la base de données !!!



    
    // si les champs ont des données:
    if($nom && $pseudo && cleanPassword($password)) {
        
         // on le met là, en fait on peut le mettre même plus haut cela n'a aucune incidence
        $prepare = $Database->prepare('INSERT INTO client (nom_client, pseudo_client, password_client) VALUES (?, ?, ?)');

         
        // je met la methode execute() ici car sinon, si je la met hors et au dessus du if, il m'insère toutes les données, même celles qui sont erronées (du style les password non preg_match)
        // on met le sha1() ici :
        $prepare->execute(array($nom, $pseudo, sha1($password)));

        $_SESSION['infoLogin'] = '<div>Votre nom : '.$nom.'</div><div>Votre pseudo : '.$pseudo.'</div><br>';

        // si je veux afficher mon password en sah1(), je dois le respécifié sha1($password) :
        // $_SESSION['infoLogin'] = '<div class="loginStyle"><div>Votre nom : '.$nom.'</div><div>Votre pseudo : '.$pseudo.'</div><div>Votre password : '.sha1($password).'</div><br>';


        header('Location: /php-test1/php_commencement_septembre/PDO/exo_inscription/login.php'); 
        exit;
            
      

    } else {
        $_SESSION['erreurInscription'] = "Vous n'avez pas utilisé tous les champs requis. <br>";
        header('Location: /php-test1/php_commencement_septembre/PDO/exo_inscription/inscription.php');
        exit;
    }
