<?php

class Rdv
{

    protected $_id;
    protected $_idPatients;
    protected $_dateHour;


    //insertion de données de rdv
    public function rdvAjout(PDO $database)
    {

        if (isset($_POST['idPatients'], $_POST['datetime'])) {

            $idPatients = $_POST['idPatients'];
            $datetime = $_POST['datetime'];

            $rdvAjout = $database->prepare('INSERT INTO appointments (idPatients, dateHour) VALUES (?,?)');

            $rdvAjout->execute([$idPatients, $datetime]);
        }
    }


    // faire la page et la liste des rdv:
    public function getAfficheRdv(PDO $database)
    {

        // stock dans $affiche, la requete du SELECT
        $afficheRdv = $database->prepare('SELECT * FROM appointments');
        // j'attribut la methode execute a mon $affiche qui possède la requete SELECT. Comme je n'ai pas mis de WHERE, je n'ai pas de paramètre a chercher, donc dans l'execute, je ne mets rien.
        $afficheRdv->execute();
        // dans $table je stock le fetchAll que j'ai attribué à $affiche
        $table = $afficheRdv->fetchAll(PDO::FETCH_ASSOC);

        return $table;
    }


    // fonction pour afficher un seul rdv dans la page rendez-vous, après avoir appuyé sur le bouton RDV qui est dans chaque ligne du tableau de la page liste rendez-vous.
    public function getRDV(PDO $database, $id = NULL)
    {
        $sql = $database->prepare("SELECT * FROM appointments where id = ?");
        $sql->execute(array($id));
        $table = $sql->fetch();

        return $table;
    }


    // update rdv : 
    public function upRdv(PDO $database, $id, $dateHour)
    {
        $upRdv = $database->prepare('UPDATE appointments SET dateHour = :dateHour WHERE id = :id');

        $upRdv->bindParam(':dateHour', $dateHour);
        $upRdv->bindParam(':id', $id);
        $upRdv->execute([':dateHour' => $dateHour, ':id' => $id]);

        header('Location: /php-test1/php_commencement_septembre/crud/exo_patients/rendezvous.php?id=' . $id . '');
    }


    // Sur la page profil du patient, afficher sous ses informations la liste de ses rendez-vous.
    public function getRdvPatient(PDO $database, $idPatients)
    {

        $lien = $database->prepare('SELECT * FROM appointments INNER JOIN patients ON appointments.idPatients = patients.id WHERE idPatients = ?');

        $lien->execute(array($idPatients));

        $horaire = $lien->fetch();

        return $horaire;
    }

    // delete rdv:
    public function deleteRdv(PDO $database, $id)
    {

        $delete =  $database->prepare("DELETE FROM appointments WHERE id = ?");
        $delete->execute(array($id));
    }
}
