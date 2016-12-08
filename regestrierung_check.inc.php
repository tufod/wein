<?php

//ini_set('session.use_trans_sid', 1);
session_start();
require_once './biblio.inc.php';
$benutzer = benutzer_Email_check($_POST['email']);
if ($benutzer['id_benutzer'] > 0) {
    $_SESSION['id_benutzer'] .= ',email';
    header('Location: regestrierung.php');
    exit;
} else {
    $anrede = $_POST['anrede'];
    $vorname = $_POST['vorname'];
    $pattern = '[a-zA-Z .`-\´öäü]*';
    $vorname_pruefen = preg_match($pattern, $vorname);
    if (!$vorname_pruefen) {
        $_SESSION['id_benutzer'] .= ',vorname';
    }

    $nachname = $_POST['nachname'];
    $nachname_pruefen = preg_match($pattern, $nachname);
    if (!$nachname_pruefen) {
        $_SESSION['id_benutzer'] .= ',nachname';
    }

    $geburtsdatum_jahr = $_POST['geburtsdatum_jahr'];
    $geburtsdatum_monat = $_POST['geburtsdatum_monat'];
    $geburtsdatum_tag = $_POST['geburtsdatum_tag'];
    $datum_pruefen = datum_pruefen($geburtsdatum_jahr, $geburtsdatum_monat, $geburtsdatum_tag);
    if (!$datum_pruefen) {
        $_SESSION['id_benutzer'] .= ',datum';
    }

    $ort = $_POST['ort'];
    $ort_pruefen = preg_match($pattern, $ort);
    if (!$ort_pruefen) {
        $_SESSION['id_benutzer'] .= ',ort';
    }


    $strasse = $_POST['strasse'];
    $strasse_pruefen = preg_match($pattern, $strasse);
    if (!$strasse_pruefen) {
        $_SESSION['id_benutzer'] .= ',strasse';
    }

    $pattern = '[0-9]+[a-z]*';
    $hausnummer = $_POST['hausnummer'];
    $hausnummer_pruefen = preg_match($pattern, $hausnummer);
    if (!$hausnummer_pruefen) {
        $_SESSION['id_benutzer'] .= ',hausnummer';
    }

    $pattern = '[0-9]{0,9}';
    $plz = $_POST['plz'];
    $plz_pruefen = preg_match($pattern, $plz);
    if (!$plz_pruefen) {
        $_SESSION['id_benutzer'] .= ',plz';
    }

    $pattern = '[0-9]{0,15}';
    $telefon = $_POST['telefon'];
    $telefon_pruefen = preg_match($pattern, $telefon);
    if (!$telefon_pruefen) {
        $_SESSION['id_benutzer'] .= ',telefon';
    }

    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $vergleichung = password_vergleichen($pass1, $pass2);
    if (!$vergleichung) {
        $_SESSION['id_benutzer'] .= ',password';
    }
    
    if($_SESSION['id_benutzer']>0){
        header('Location: regestrierung.php');
        exit;
    }
    $con=con_db();
     $sql='';
    email2benutzer($id_benutzer, 'aktivation');
   
    uncon_db($con);
}
?>