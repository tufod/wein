<?php

//ini_set('session.use_trans_sid', 1);
session_start();
require_once './biblio.inc.php';
$benutzer = benutzer_Email_check($_POST['email']);
if ($benutzer['id_benutzer'] > 0) {
    $_SESSION['id_benutzer'] = ',email_falsch';
    header('Location: regestrierung.php');
    exit;
}
else {
    $_SESSION['id_benutzer']='';
    $anrede = $_POST['anrede'];
    $vorname = $_POST['vorname'];
   if (preg_match("/^[a-zA-Z .`-\´öäü]*$/", $vorname)==0) {
        $_SESSION['id_benutzer'] = ',vorname_falsch';
    }

    $nachname = $_POST['nachname'];
    if ( preg_match("/^[a-zA-Z .`-\´öäü]*$/", $nachname)==0) {
       $_SESSION['id_benutzer'] .= ',nachname_falsch';
    }
    

    $geburtsdatum_jahr = $_POST['geburtsdatum_jahr'];
    $geburtsdatum_monat = $_POST['geburtsdatum_monat'];
    $geburtsdatum_tag = $_POST['geburtsdatum_tag'];
    $datum_pruefen = datum_pruefen($geburtsdatum_jahr, $geburtsdatum_monat, $geburtsdatum_tag);
    if (!$datum_pruefen) {
        $_SESSION['id_benutzer'] .= ',datum_falsch';
    }

    $ort = $_POST['ort'];
    if ( preg_match("/^[a-zA-Z .`-\´öäü]*$/", $ort)==0) {
        $_SESSION['id_benutzer'] .= ',ort_falsch';
    }


    $strasse = $_POST['strasse'];
   
    if ( preg_match("/^[a-zA-Z öä.ü-]*$/", $strasse)==0) {
        $_SESSION['id_benutzer'] .= ',strasse_falsch';
    }

   
    $hausnummer = $_POST['hausnummer'];
    
    if ( preg_match("/^[0-9]+[a-z]*$/", $hausnummer) == 0) {
        $_SESSION['id_benutzer'] .= ',hausnummer_falsch';
    }
    
    
    $ort = $_POST['ort'];
    
    if ( preg_match("/^[a-zA-Z .`-\´öäü]*$/", $ort) == 0) {
        $_SESSION['id_benutzer'] .= ',ort_falsch';
    }

   
    $plz = $_POST['plz'];  
    if ( preg_match("/^[0-9]{0,9}$/", $plz) ==0) {
        $_SESSION['id_benutzer'] .= ',plz_falsch';
    }

  
    $telefon = $_POST['telefon'];   
    if ( preg_match("/^[0-9]{0,15}$/", $telefon) ==0) {
        $_SESSION['id_benutzer'] .= ',telefon_falsch';
    }

    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $vergleichung = password_vergleichen($password1, $password2);
    if (!$vergleichung) {
        $_SESSION['id_benutzer'] .= ',password_falsch';
    }
    
    if($_SESSION['id_benutzer'] !=''){
        header('Location: regestrierung.php');
        exit;
    }
//    header('Location: regestrierung.php');
//        exit;
    $con=con_db();
     $sql='';
    //email2benutzer($id_benutzer, 'aktivation');
   
    uncon_db($con);
}
?>