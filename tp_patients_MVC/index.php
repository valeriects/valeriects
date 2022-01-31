<?php
require_once './controller/Controller.php';

$controller = new Controller;


try {
    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'accueil') {
            $controller->index();
        } elseif ($_GET['action'] == 'ajoutPatient') {
            $controller->ajoutPatient();
        } elseif ($_GET['action'] == 'listePatient') {

            $controller->listePatient();
        } elseif ($_GET['action'] == 'profilPatient') {
            $controller->profilPatient();
        } elseif ($_GET['action'] == 'ajoutRdv') {
            $controller->ajoutRdv();
        } elseif ($_GET['action'] == 'listeRdv') {
            $controller->listeRdv();
        } elseif ($_GET['action'] == 'rdv') {
            $controller->rdv();
        }
    } else {
        $controller->index();
    }
} catch (Exception $e) {
    // msg erreur pour les exceptions avec la methode getMessage() attribuée à $e qui est le paramètre de catch()
    echo 'Connection failed:' . $e->getMessage();
}
