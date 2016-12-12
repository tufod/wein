<?php
/*
* Session start +
*/
//ini_set('session.use_trans_sid', 1);
session_start();
require_once './biblio.inc.php';
$benutzer = benutzer_EmailUndPassword_check($_POST['e_mail'], $_POST['password']);
if ($benutzer['id_benutzer'] == 1) {
    header('Location: liste.php');
}
else {
if ($benutzer['id_benutzer'] > 0) {
    $_SESSION['id_benutzer'] = $benutzer['id_benutzer'];
    $_SESSION['anrede'] = $benutzer['anrede'];
    $_SESSION['vorname'] = $benutzer['vorname'];
    $_SESSION['nachname'] = $benutzer['nachname'];
    $_SESSION['geburtsdatum'] = $benutzer['geburtsdatum'];
    $_SESSION['telefon'] = $benutzer['telefon'];
    $_SESSION['email'] = $benutzer['email'];
    $_SESSION['rech_adresse_id'] = $benutzer['rech_adresse_id'];
    $_SESSION['lief_adresse_id'] = $benutzer['lief_adresse_id'];
    header('Location: liste.php');
    exit;
} 
else {
    $_SESSION['id_benutzer'] = 0;
    header('Location: login.php');
    exit;
    }
}
?>