<?php

//ini_set('session.use_trans_sid', 1);
session_start();
require_once './biblio.inc.php';
if (isset($_GET['kunde'])) {
$con = con_db();
$sql = 'SELECT 
        be.id_benutzer,
        be.anrede,
        be.vorname,
        be.nachname,
        YEAR(be.geburtsdatum) AS geburtsdatum_jahr,
        MONTH(be.geburtsdatum) AS geburtsdatum_monat,
        DAY(be.geburtsdatum) AS geburtsdatum_tag,
        be.telefon,
        be.email,
        ad.strasse,
        ad.hausnummer,
        ad.ort,
        ad.plz,
        liefer_oder_rechnung 
FROM benutzer be
JOIN adressen ad ON ad.benutzer_id=be.id_benutzer
WHERE be.id_benutzer=43 
ORDER BY ad.liefer_oder_rechnung;';
$res = mysqli_query($con, $sql);
$benutzer = mysqli_fetch_assoc($res);
$_SESSION['id_benutzer'] = $benutzer['id_benutzer'];
$_SESSION['anrede'] = $benutzer['anrede'];
$_SESSION['vorname'] = $benutzer['vorname'];
$_SESSION['nachname'] = $benutzer['nachname'];
$_SESSION['geburtsdatum_jahr'] = $benutzer['geburtsdatum_jahr'];
$_SESSION['geburtsdatum_monat'] = $benutzer['geburtsdatum_monat'];
$_SESSION['geburtsdatum_tag'] = $benutzer['geburtsdatum_tag'];
$_SESSION['telefon'] = $benutzer['telefon'];
$_SESSION['email'] = $benutzer['email'];
$_SESSION['lieferung_strasse'] = $benutzer['strasse'];
$_SESSION['lieferung_hausnummer'] = $benutzer['hausnummer'];
$_SESSION['lieferung_ort'] = $benutzer['ort'];
$_SESSION['lieferung_plz'] = $benutzer['plz'];


if ($benutzer['liefer_oder_rechnung'] == 'liefer_und_rechnung') {
$_SESSION['rechnung_strasse'] = $_SESSION['lieferung_strasse'];
$_SESSION['rechnung_hausnummer'] = $_SESSION['lieferung_hausnummer'];
$_SESSION['rechnung_ort'] = $_SESSION['lieferung_ort'];
$_SESSION['rechnung_plz'] = $_SESSION['lieferung_plz'];
} else {
$benutzer = mysqli_fetch_assoc($res);
$_SESSION['rechnung_strasse'] = $benutzer['strasse'];
$_SESSION['rechnung_hausnummer'] = $benutzer['hausnummer'];
$_SESSION['rechnung_ort'] = $benutzer['ort'];
$_SESSION['rechnung_plz'] = $benutzer['plz'];
}



uncon_db($con);
header('Location: kundenkonto.php');
exit;
}
if(isset($_POST)){
$_SESSION['fehler'] = '';
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
$strasse = $_POST['rechnung_strasse'];
if (preg_match("/^[a-zA-Z öä.ü-]*$/", $strasse) == 0) {
$_SESSION['fehler'] .= ',Rechnung Strasse';
}
$hausnummer = $_POST['rechnung_hausnummer'];
if (preg_match("/^[0-9]+[a-z]*$/", $hausnummer) == 0) {
$_SESSION['fehler'] .= ',Rechnung Hausnummer';
}
$ort = $_POST['rechnung_ort'];
if (preg_match("/^[a-zA-Z .`-\´öäü]*$/", $ort) == 0) {
$_SESSION['fehler'] .= ',Rechnung Ort';
}
$plz = $_POST['rechnung_plz'];
if (preg_match("/^[0-9]{0,9}$/", $plz) == 0) {
$_SESSION['fehler'] .= ',Rechnung Plz';
}
$strasse = $_POST['lieferung_strasse'];
if (preg_match("/^[a-zA-Z öä.ü-]*$/", $strasse) == 0) {
$_SESSION['fehler'] .= ',Lieferung Strasse';
}
$hausnummer = $_POST['lieferung_hausnummer'];
if (preg_match("/^[0-9]+[a-z]*$/", $hausnummer) == 0) {
$_SESSION['fehler'] .= ',Lieferung Hausnummer';
}
$ort = $_POST['lieferung_ort'];
if (preg_match("/^[a-zA-Z .`-\´öäü]*$/", $ort) == 0) {
$_SESSION['fehler'] .= ',Lieferung Ort';
}
$plz = $_POST['lieferung_plz'];
if (preg_match("/^[0-9]{0,9}$/", $plz) == 0) {
$_SESSION['fehler'] .= ',Lieferung Plz';
}
$telefon = $_POST['telefon'];
if (preg_match("/^[0-9]{0,15}$/", $telefon) == 0) {
$_SESSION['fehler'] .= ',Telefon';
}
$password1 = $_POST['password1'];
$password2 = $_POST['password2'];
$vergleichung = password_vergleichen($password1, $password2);
if (!$vergleichung) {
$_SESSION['fehler'] .= ',Password';
}
if ($_SESSION['fehler'] != '') {
header('Location: kundenkonto.php');
exit;

} else {

$con = con_db();
$sql = 'UPDATE benutzer SET 
        anrede=\''.$_POST['anrede'].'\',
        nachname=\''.$_POST['nachname'].'\',
        vorname=\''.$_POST['vorname'].'\',
        geburtsdatum=\''.$_POST['geburtsdatum_jahr'].'-'.$_POST['geburtsdatum_monat'].'-'.$_POST['geburtsdatum_tag'].'\',
        telefon='.$_POST['telefon'].',
        email=\''.$_POST['email'].'\',email_aktiv=\'ja\'
WHERE id_benutzer='.$_SESSION['id_benutzer'].';';

mysqli_query($con, $sql);
// $last_id=mysql_insert_id();

$sql = 'UPDATE adressen SET 
    strasse=\''.$_POST['lieferung_strasse'].'\',
    hausnummer=\''. $_POST['lieferung_hausnummer'].'\',
    ort=\''.$_POST['lieferung_ort'].'\',
    plz=\''. $_POST['lieferung_plz'].'\'
WHERE (benutzer_id='.$_SESSION['id_benutzer'].' and liefer_oder_rechnung=\'lieferung\');


UPDATE adressen SET 
    strasse=\''.$_POST['rechnung_strasse'].'\',
    hausnummer=\''. $_POST['rechnung_hausnummer'].'\',
    ort=\''.$_POST['rechnung_ort'].'\',
    plz=\''. $_POST['rechnung_plz'].'\'
WHERE (benutzer_id='.$_SESSION['id_benutzer'].' and liefer_oder_rechnung=\'rechnung\');';

mysqli_query($con, $sql);
if($password1 !=''){
$password = md5($password1);
$sql = 'UPDATE  zugang SET password=\''.$password.'\' '
        . 'WHERE benutzer_id='.$_SESSION['id_benutzer'].' ;';
mysqli_query($con, $sql);
}
uncon_db($con);
//email2benutzer($benutzer['id_benutzer'], 'aktivation');
header('Location: kundenkonto.php');
exit;
}
}
?>

