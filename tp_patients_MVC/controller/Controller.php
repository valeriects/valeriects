<?php
require_once './model/Database.php';
require_once './model/Patients.php';
require_once './model/Rdv.php';
require_once './model/Form.php';


class Controller extends Database
{
    protected $_conn;

    public function __construct()
    {
        $this->_conn = new Database;
    }



    // page index
    public function index()
    {
        require './view/indexView.php';
    }


    // page ajout-patient
    public function ajoutPatient()
    {
        /***** Le FORMULAIRE *******/
        // les paramètre de ma class Form : 
        $action = './index.php?action=ajoutPatient';
        $method = 'post';
        $id = '';

        // method et action de la balise formulaire
        $form = new Form($action, $method, $id);
        // j'attribus des fonctions à ma variable $form
        // chaque fonction est un input, et parce que je les attribut a  ma variable $form, alors je peux m'en servir, les avoir sur cette page quoi.
        $form->addTextField('lastname', 'text', '', 'Votre Nom');
        $form->addTextField('firstname', 'text', '', 'Votre Prenom');
        $form->addTextField('birthdate', 'text', '', 'Date de naissance');
        $form->addTextField('phone', 'text', '', 'Numéro de téléphone');
        $form->addTextField('mail', 'text', '', 'Votre email');
        // ici, cest l'input type="submit"
        $form->addSubmitButton('Enregistrer');

        // instanciation vers la class Patient:
        $ajout = new Patient();

        // je récupère la fonction ajout() de ma class Patient afin de m'en servir ici.
        // ma fonction ajout() qui vient de ma classe Patient a pour paramètre la variable $conn (qui est instanciée vers la class Database) a qui on attribut la fonction getRetour() de la classe Database:
        $ajout->ajout($this->_conn->getRetour());

        require_once './view/ajout-patient.php';
    }


    // page liste-patient
    public function listePatient()
    {
        // instanciation vers la class Patient :
        $liste = new Patient();

        $table = $liste->getAffiche($this->_conn->getRetour());



        if (!empty($_GET['id'])) {

            $liste->delete($this->_conn->getRetour(), $_GET['id']);
        }
        require_once './view/liste-patients.php';
    }


    // page profil-patient
    public function profilPatient()
    {
        $rdv = new Rdv();


        if (!isset($_POST['submit'])) {
            // instanciation vers la class Patient:
            $liste = new Patient();


            // je récupère la fonction getProfil() de ma class Patient afin de m'en servir ici. Comme c'est un get, cela ne fait qu'afficher les infos de ma fonction.
            // ma fonction getProfil() qui vient de ma classe Patient a pour paramètre la variable $conn a qui on attribut la fonction getRetour() de la classe Database
            $table = $liste->getProfil($this->_conn->getRetour());

            // affiche mes données de mon $id dans les champs des inputs:
            $liste->getInputProfil($this->_conn->getRetour());
        } else {
            // sinon, si le bouton submit me renvois un formulaire remplit alors:
            // instanciation vers la class Patient:
            $liste = new Patient();
            // j'affiche les infos qui vient de l'input id (qui est invisible)
            $table = $liste->getProfil($this->_conn->getRetour(), $_POST['id']);

            // affiche mes données de mon $id dans les champs des inputs:
            $liste->getInputProfil($this->_conn->getRetour(), $_POST['id']);
        }

        // du coup si les champs sont remplis alors je push les données et cela les modifie sur la page, sur la liste-patients et dans la base de données:
        if (isset($_POST['lastname']) && $_POST['firstname'] && $_POST['birthdate'] && $_POST['phone'] && $_POST['mail'] && $_POST['submit']) {

            //  il faut que je mette cette fonction dans une condition qui lorsque je fais le submit, je fais ma fonction updateProfil
            $liste->updateProfil($this->_conn->getRetour(), $_POST['lastname'], $_POST['firstname'], $_POST['birthdate'], $_POST['phone'], $_POST['mail'], $_POST['id']);
        }


        // var_dump($liste->_id);
        // var_dump($_GET['id']);

        // affiche les rdv correspondant au patient
        $horaire = $rdv->getRdvPatient($this->_conn->getRetour(), $liste->_id);


        /***** Le FORMULAIRE *******/
        // les paramètre de ma class Form : 
        // $_SERVER['PHP_SELF'] cest une variable globale pour ke la page s'appelle elle-même:
        $action = htmlspecialchars(' ./index.php?id=' . $_GET['id'] . '&action=profilPatient');
        $method = 'post';
        $id = '';

        $input1 = !empty($liste->_lastname) ? $liste->_lastname : '';
        $input2 = !empty($liste->_firstname) ? $liste->_firstname : '';
        $input3 = !empty($liste->_birthdate) ? $liste->_birthdate : '';
        $input4 = !empty($liste->_phone) ? $liste->_phone : '';
        $input5 = !empty($liste->_mail) ? $liste->_mail : '';
        $input6 = $liste->_id;
        // method et action de la balise formulaire
        $form = new Form($action, $method, $id);
        // j'attribus des fonctions à ma variable $form
        // chaque fonction est un input, et parce que je les attribut a  ma variable $form, alors je peux m'en servir, les avoir sur cette page quoi.
        $form->addTextField('lastname', 'text', $input1, 'Votre Nom');
        $form->addTextField('firstname', 'text', $input2, 'Votre Prenom');
        $form->addTextField('birthdate', 'text', $input3, 'Date de naissance');
        $form->addTextField('phone', 'text', $input4, 'Numéro de téléphone');
        $form->addTextField('mail', 'text', $input5, 'Votre email');
        $form->addHidden('id', 'hidden', $input6);

        //  'ici, c'est le bouton type="submit"';
        $form->addSubmitButton('Enregistrer');

        require_once './view/profil-patient.php';
    }



    // page ajout-rdv
    public function ajoutRdv()
    {
        // $_SERVER['PHP_SELF'] cest une variable globale pour que la page s'appelle elle-même:
        $action = htmlspecialchars(' ./index.php?action=ajoutRdv');
        $method = 'post';
        $id = '';

        // instanciation vers ma class Database:
        $conn = new Database();

        $form = new Form($action, $method, $id);
        $form->addTextField('idPatients', 'text', '', 'L\'id patient');
        $form->addTextField('datetime', 'datetime', '', 'yyyy/mm/dd hh:mm:ss');

        $form->addSubmitButton('Enregistrer');

        // instanciation vers ma class Rdv:
        $ajoutRdv = new Rdv();

        if (isset($_POST['idPatients'], $_POST['datetime'])) {
            $ajoutRdv->rdvAjout($conn->getRetour());
        }

        require_once './view/ajout-rendezvous.php';
    }


    // page liste-rdv
    public function listeRdv()
    {
        $listeR = new Rdv();
        $table = $listeR->getAfficheRdv($this->_conn->getRetour());

        if (!empty($_GET['id'])) {
            echo '<div class="red"> ATTENTION : Voulez vous vraiment supprimer ce rendez-vous ?</div><br>';
            $listeR->deleteRdv($this->_conn->getRetour(), $_GET['id']);
        }

        require_once './view/liste-rendezvous.php';
    }


    // page rendez-vous
    public function rdv()
    {
        $action = htmlspecialchars(' ./index.php?action=rdv');
        $method = 'post';
        $id = '';
        $form = new Form($action, $method, $id);

        // instanciation vers la class RDV :
        $listeR = new Rdv();

        if ($_GET['id']) {
            // affiche un seul rdv
            $info = $listeR->getrdv($this->_conn->getRetour(), $_GET['id']);
        }

        if (isset($_POST['Hidden'], $_POST['Horaire_RDV'])) { // modifie un rdv
            $listeR->upRdv($this->_conn->getRetour(), $_POST['Hidden'], $_POST['Horaire_RDV']);
        }

        $form->addHidden('Hidden', 'hidden', '' . $_GET['id'] . '');
        $form->addTextField('Horaire_RDV', 'datetime', '' . $info['dateHour'] . '', 'yyyy/mm/dd h:m:s');

        $form->addSubmitButton('Modifier');

        require_once './view/rendezvous.php';
    }
}
