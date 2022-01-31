<?php
   
    define('BASEDONNEDUHOST', 'localhost');
    define('PORTDEBASEDONNEE', '3306');
    define('DB_NAME', 'bienvenue');
    define('DB_USER','root');
    define('DB_PASSWORD','');

    $Database = new PDO('mysql:host='.BASEDONNEDUHOST.';port='.PORTDEBASEDONNEE.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);

    $nom = cleanVar($_POST['nom']);
    $pseudo = cleanVar($_POST['pseudo']);
    $password = $_POST['password'];

    function cleanVar($var) {
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return $var;
    }

    function cleanPassword($var) {
        $pattern = '/^(?=.{8,}$)(?=.*?[a-z])(?=.*?[A-Z])(?=.*?[0-9])(?=.*?\W).*$/';
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);

        return preg_match($pattern, $var);
        
    }


?>
