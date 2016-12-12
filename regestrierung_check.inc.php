<?php

//ini_set('session.use_trans_sid', 1);
session_start();
require_once './biblio.inc.php';
$benutzer = benutzer_Email_check($_POST['email']);
$_SESSION['anrede'] = $_POST['anrede'];
$_SESSION['vorname'] = $_POST['vorname'];
$_SESSION['nachname'] = $_POST['nachname'];
$_SESSION['geburtsdatum_jahr'] = $_POST['geburtsdatum_jahr'];
$_SESSION['geburtsdatum_monat'] = $_POST['geburtsdatum_monat'];
$_SESSION['geburtsdatum_tag'] = $_POST['geburtsdatum_tag'];
$_SESSION['strasse'] = $_POST['strasse'];
$_SESSION['hausnummer'] = $_POST['hausnummer'];
$_SESSION['ort'] = $_POST['ort'];
$_SESSION['plz'] = $_POST['plz'];
$_SESSION['telefon'] = $_POST['telefon'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['fehler'] = '';
if ($benutzer['id_benutzer'] > 0) {
    $_SESSION['fehler'] = 'Email';
    header('Location: regestrierung.php');
    exit;
} else {    
    $anrede = $_POST['anrede'];
    $vorname = $_POST['vorname'];
    if (preg_match("/^[a-zA-Z .`-\´öäü]*$/", $vorname) == 0) {
        $_SESSION['fehler'] = ',Vorname';
    }
    $nachname = $_POST['nachname'];
    if (preg_match("/^[a-zA-Z .`-\´öäü]*$/", $nachname) == 0) {
        $_SESSION['fehler'] .= ',Nachname';
    }
    $geburtsdatum_jahr = $_POST['geburtsdatum_jahr'];
    $geburtsdatum_monat = $_POST['geburtsdatum_monat'];
    $geburtsdatum_tag = $_POST['geburtsdatum_tag'];
    $datum_pruefen = checkdate($geburtsdatum_monat, $geburtsdatum_tag, $geburtsdatum_jahr);
    if (!$datum_pruefen) {
        $_SESSION['fehler'] .= ',Geburtsdatum';
    }
    $strasse = $_POST['strasse'];
    if (preg_match("/^[a-zA-Z öä.ü-]*$/", $strasse) == 0) {
        $_SESSION['fehler'] .= ',Strasse';
    }
    $hausnummer = $_POST['hausnummer'];
    if (preg_match("/^[0-9]+[a-z]*$/", $hausnummer) == 0) {
        $_SESSION['fehler'] .= ',Hausnummer';
    }
    $ort = $_POST['ort'];
    if (preg_match("/^[a-zA-Z .`-\´öäü]*$/", $ort) == 0) {
        $_SESSION['fehler'] .= ',Ort';
    }
    $plz = $_POST['plz'];
    if (preg_match("/^[0-9]{0,9}$/", $plz) == 0) {
        $_SESSION['fehler'] .= ',Plz';
    }
    $telefon = $_POST['telefon'];
    if (preg_match("/^[0-9]{0,15}$/", $telefon) == 0) {
        $_SESSION['fehler'] .= ',Telefon';
    }
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $vergleichung = password_vergleichen($password1, $password2);
    if (!$vergleichung) {
        $_SESSION['fehler'] .= ',Password';
    }
    if ($_SESSION['fehler'] != '') {
        header('Location: regestrierung.php');
        exit;
    }
//    header('Location: regestrierung.php');
//        exit;
    $con = con_db();
    $sql = 'INSERT INTO benutzer (anrede,nachname,vorname,geburtsdatum,telefon,email,email_aktiv) 
        VALUES (\''
            .$_SESSION['anrede'] .'\',\''
            .$_SESSION['nachname'].'\',\''
            .$_SESSION['vorname'].'\',\''
            .$_SESSION['geburtsdatum_jahr'].'-'
            .$_SESSION['geburtsdatum_monat']. '-'
            .$_SESSION['geburtsdatum_tag'].'\',\''
            .$_SESSION['telefon'].'\',\''
            .$_SESSION['email'].'\',\'nein\');';
    
    mysqli_query($con, $sql);
    $sql='SELECT MAX(id_benutzer) AS id_benutzer FROM benutzer;';
    $res=mysqli_query($con, $sql);
   $last_id= mysqli_fetch_assoc($res);
   $last_id= intval($last_id['id_benutzer']);
   $_SESSION['plz']= intval($_SESSION['plz']);
   // $last_id=mysql_insert_id();
   
   
$sql='INSERT INTO adressen (benutzer_id,strasse,hausnummer,ort,plz,liefer_oder_rechnung) 
VALUES ('
        .$last_id.',\''
        .$_POST['strasse'].'\',\''
        .$_POST['hausnummer'].'\',\''
        .$_POST['ort'].'\','
        .$_POST['plz'].',\'lieferung\');';
mysqli_query($con, $sql);
       $sql=' INSERT INTO adressen (benutzer_id,strasse,hausnummer,ort,plz,liefer_oder_rechnung) 
VALUES ('
        .$last_id.',\''
        .$_POST['strasse'].'\',\''
        .$_POST['hausnummer'].'\',\''
        .$_POST['ort'].'\','
        .$_POST['plz'].',\'rechnung\');';
        
mysqli_query($con, $sql);
$password=md5($password1);
$sql='INSERT INTO zugang (benutzer_id,password) 
VALUES ('
        .$last_id.',\''
        .$password.'\');';
mysqli_query($con, $sql);
    uncon_db($con);
    //email2benutzer($benutzer['id_benutzer'], 'aktivation');
    header('Location: liste.php');
    exit;
}
?>