<?php
/*
* Session start
*/
//ini_set('session.use_trans_sid', 1);
session_start();
require_once './biblio.inc.php';

/*
 * Prüfung ob der Benutzer eine exestierende eMail und das richtige Password hat
 * email und ID_benutzer werdern zurück gegeben
 */
$email=$_POST['e_mail'];
$password=$_POST['password'];
$benutzer = benutzer_EmailUndPassword_check($email, $password);

/*
 * Prüfung gibt Ergebnis zurück das die eMail bereits in der Datenbank ist
 */
if ($benutzer['id_benutzer'] > 0) {
    $_SESSION['id_benutzer'] = $benutzer['id_benutzer'];
    $_SESSION['vorname'] = $benutzer['vorname'];
    
   /*
    * Leitet die ergebnisse (vorname, id_benutzer) in die (liste.php)
    */
    header('Location: liste.php');
    exit;
    
    /*
     * fehler Pfüfung (eMail Vorhanden)
     */
} else {
    $_SESSION['fehler'] = 'Email';
    $_SESSION['id_benutzer'] = 0;
    
    /*
    * Leitet die ergebnisse (fehler eMail, id_benutzer(= 0)) in die (login.php)
    */
    header('Location: login.php');
    exit;
}
?>