<?php

class Patient
{
    // obligée de définir les propriétés ici, car j'en ai besoin pr 'exo 4
    public $_lastname;
    public $_firstname;
    public $_birthdate;
    public $_phone;
    public $_mail;
    public $_id;

    // fonction pour ajouter des données dans la DBB
    public function ajout(PDO $database)
    {

        /*** Début injection de données dans la base de données */
        // ici le isset, comme il est mit sur tous les $_POST[''], on peut les rassembler dans un seul isset($_POST[''], $_POST['']) et on les enchaines avec des virgules
        if (isset($_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail'])) {

            // je dois définir les variables, pour qu'elle sachent qu'elles doivent prendre la valeur des inputs.
            $lastname = $_POST['lastname'];
            $firstname = $_POST['firstname'];
            $birthdate = $_POST['birthdate'];
            $phone = $_POST['phone'];
            $mail = $_POST['mail'];

            if ($lastname && $firstname && $birthdate && $phone && $mail)
            // on stock la requete $database->prepare() dans $ajout:
            {
                $ajout = $database->prepare('INSERT INTO patients (lastname, firstname, birthdate, phone, mail) VALUES (?,?,?,?,?)');

                // j'attribut la methode execute() à $ajout, lui passant /donnant les valeurs sous forme de tableau.
                $ajout->execute(array($lastname, $firstname, $birthdate, $phone, $mail));

                // je veux afficher une phrase qui m'indique que j'ai bien effectué mon injection de donnée
                $_SESSION['good'] = 'Vous êtes bien inscrit.<br>';
               
            } else {
                // message d'erreur si mes entrées d'input sont vides
                $_SESSION['errorAjout'] = 'Entrée invalide.<br>';
            }
        }
    }


    // fonction pour afficher la liste des patients:
    public function getAffiche(PDO $database)
    {
        // sotck dans $affiche, la requete du SELECT
        $affiche = $database->prepare('SELECT * FROM patients');
        // j'attribut la methode execute a mon $affiche qui possède la requete SELECT. Comme je n'ai pas mis de WHERE, je n'ai pas de paramètre a chercher, donc dans l'execute, je ne mets rien.
        $affiche->execute();
        // dans $table je stock le fetchAll que j'ai attribué à $affiche
        $table = $affiche->fetchAll(PDO::FETCH_ASSOC);
        
        return $table;
    }


    //  $idBis = NULL car comme cela je n'ai pas besoin de mettre une valeur en passant la fonction, sauf si je veux lui mettre une valeur particulière
    public function getProfil(PDO $database, $idBis = NULL)
    {
        // si il y a une donnée envoyé pour l'id, alors on met dans $id, et le get et le post de id
        if (!empty($_GET['id'])) {
            $id = $_REQUEST['id'];
        } else {
            $id = $idBis;
        }

        // si le $id est null, alors je n'ai pas de ligne donc je reste sur ma page liste_patient.php:


        $sql = $database->prepare("SELECT * FROM patients where id = ?");
        $sql->execute(array($id));
        $table = $sql->fetch(PDO::FETCH_ASSOC);
        
        return $table;
       
    }

    
    // l'affichage du $id dans les inputs:
    public function getInputProfil(PDO $database, $idBis = NULL)
    {

        if (!empty($_GET['id'])) {

            $id = $_REQUEST['id'];
        } else {
            $id = $idBis;
        }


        $update = $database->prepare('SELECT * FROM patients WHERE id = ?');

        $update->execute([$id]);
        $upTablo = $update->fetch(PDO::FETCH_ASSOC);
        // au lieu de if(count($upTablo) >0) , autant dire s'il y a $upTablo sachant qu'on a un fetch one et pas un fetchAll, donc dans tout les cas on me renvois une seule donnée(objet):
        if ($upTablo) {
            // var_dump($upTablo);
            $this->_id = $upTablo['id'];
            $this->_lastname = $upTablo['lastname'];
            $this->_firstname = $upTablo['firstname'];
            $this->_birthdate = $upTablo['birthdate'];
            $this->_phone = $upTablo['phone'];
            $this->_mail = $upTablo['mail'];
        }
    }


    // le update
    public function updateProfil(PDO $database, $lastname, $firstname, $birthdate, $phone, $mail, $id)
    {

        $update = $database->prepare("UPDATE patients SET lastname = ?, firstname = ?, birthdate = ?, phone = ?, mail = ? WHERE id= ?");

        $update->execute([$lastname, $firstname, $birthdate, $phone, $mail, $id]);

        header("Location: /php-test1/php_commencement_septembre/CRUD/exo_patients/profil-patient.php?id=" . $this->_id);
    }



    // fonction set des propriétés qui sont en private:
    public function setProfil($lastname, $firstname, $birthday, $phone, $mail)
    {
        $this->_lastname = $lastname;
        $this->_firstname = $firstname;
        $this->_birthdate = $birthday;
        $this->_phone = $phone;
        $this->_mail = $mail;
    }



    // le delete :
    public function delete(PDO $database, $id = NULL)
    {
        $delete =  $database->prepare("DELETE FROM patients WHERE id = ?");
        $delete->execute(array($id));

    }
}
