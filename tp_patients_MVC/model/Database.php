<?php

class Database
{
    // propriétés qui sont utilisées pour l'instanciation avec la class PDO pour la connexion avec la BDD :
    private $_dsn = "mysql:host=localhost;dbname=hospitale2n";
    private $_user = "root";
    private $_password = "";
    private $_database;

    // je mets l'instanciation dans la fonction __construct(), car ça sera les données de base de la class Database (j'ai repris là l'exemple de loic de sa correction de l'exo des clients spectacle babanas)
    public function __construct()
    {

        // comme j'ai défini les variables, ici, je mets $this->_dsn, car ce sont les données de cette class.
        $database = new PDO($this->_dsn, $this->_user, $this->_password);

        $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // du coup comme j'ai définit une propriété private $_database;, il faut que je lui dise que cela vaut $database, si je veut utiliser $database dans mes autres fonctions.
        $this->_database = $database;

        // pas de return dans le constructeur car il se retourne deja lui meme par defaut, car il retourne l'objet qu'il a créé:
        // return $database;
    }



    public function getRetour()
    {
        return $this->_database;
    }
}
