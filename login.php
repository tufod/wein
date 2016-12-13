<?php
session_start();
/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
require_once './biblio.inc.php';
/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');
/*
 *  Titel der Seite
 */
$titel = 'Login';

/*
 *  Style CSS Angabe für die Login Seite 
 */
$style='<link rel="stylesheet" href="./styles/kunden_login.css" media="screen">';

/*
 *  Ausgabe des Titels der Seite
 */
$template = str_replace('{title}', $titel, $template);

/*
 *  CSS für die Login übergabe an wein Tamplate {style} 
 */
$template = str_replace('{style}', $style, $template);

/*
 * Login Überschrift
 */
$kunde_Info = '';
/*
 *   Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde_Info, $template);
/*
 *  $erge = Seiten inhalt
 */
$login_container = '<div id="kunden_login_main">
    <h1>Login</h1>
        <form action="login_check.inc.php" method="post">
            <table id="kunden_login_main_table">
                <tr>
                    <td id="login">
                    e-Mail adresse:
                    </td>
                    <td>
                    <input id="registry" type="email" size="20" name="e_mail" value="">
                    </td>
                </tr>  
                <tr> 
                    <td id="login">
                    password:
                    </td>
                    <td>
                    <input id="registry" type="password" size="20" name="password" value="" >
                    </td>
                </tr>  
                <tr>
                   <td id="login">
                   </td>
                   <td id="login">
                   <input class="button" type="submit" id="login_button" value="Login">
                   </td>
                </tr>';
/*
 * Prüfung ob der Benutzer eine exestierende eMail und das richtige Password hat
 */
if (isset($_SESSION['fehler'])) {
    if ($_SESSION['fehler'] =='Email') {
        $login_container .= '<tr>
                   <td id="login">
                   </td>
                   <td id="login">
                   Geben Sie bitte die Email und Password!
                   </td>
                </tr>';
        $_SESSION['fehler']='';
    }
}
/*
 * Hinweis Wenn mann nicht auf der Seite Regestriert ist (link zur regestrierungs.php)
 * Hinweis wenn man das Password Vergessen hat ()
 */
$login_container .= '</table> 
             </form>  
            <table id="kunden_login_main_table">
                <tr> 
                    <td id="login">Sie sind noch nicht Regestriert dann gehen sie bitte zur <a class="button" href="regestrierung.php">Regestrierung</a></td>
                </tr>
                <tr>
                    <td id="login"> Sie haben ihr password Vergessen dann bitte hier  <a class="button" href="#">Passwort Anfordern</a></td>
                </tr>   
            </table>
            </div>';
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $login_container, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();
?>
