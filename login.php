<?php

/*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
session_start();

/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
require_once './biblio.inc.php';

$template = '';

/*
 *  Titel der Seite
 */
$titel = 'Login';

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');

/*
 * Login Überschrift
 * eMail Adress Zeile
 * Password eingabe Feld
 */

$kunde = '';


/*
 *  $erge = Seiten inhalt
 */
$erge = '<h1>Login</h1>
        <form action="login_check.inc.php" method="post">
            <table id="login_table">
                <tr>
                    <td id="login">e-Mail adresse:</td><td><input id="registry" type="email" size="20" name="e_mail" value="khaled@hotmail.com"></td>
                </tr>  
                <tr> 
                    <td id="login">password:</td><td><input id="registry" type="password" size="20" name="password" value="12345" ></td>
                </tr>  
                <tr>
                   <td id="login"></td><td id="login"><input class="button" type="submit" value="Login"></td>
                </tr>';
/*
 * Prüfung ob der Benutzer eine exestierende eMail und das richtige Password hat
 */
if (isset($_SESSION['id_benutzer'])) {
    if ($_SESSION['id_benutzer'] == 0) {
        $erge .= '<tr>
                   <td id="login"></td><td id="login">Geben Sie bitte die Email und Password!</td>
                </tr>';
    }
}

/*
 * Hinweis Wenn mann nicht auf der Seite Regestriert ist (link zur regestrierungs.php)
 * Hinweis wenn man das Password Vergessen hat ()
 */
$erge .= '</table> 
             </form>  
            <table id="login_table">
                <tr> 
                    <td id="login">Sie sind noch nicht Regestriert dann gehen sie bitte zur <a class="button" href="regestrierung.php">Regestrierung</a></td>
                </tr>
                <tr>
                    <td id="login"> Sie haben ihr password Vergessen dann bitte hier  <a class="button" href="#">Passwort Anfordern</a></td>
                </tr>   
            </table>';
/*
 *   Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);

/*
 *  Ausgabe des Titels der Seite
 */
$template = str_replace('{title}', $titel, $template);

/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $erge, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();
?>
