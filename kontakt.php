<?php
 /*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
  session_start();
// session_set_cookie_params($lifetime=3);
//session_status(2);
echo'Session-Name:',session_name(),'<br>';
echo'Session-ID (SID):',session_id(),'<br>';
// echo'session-LifeTime:', session_set_cookie_params(),'<br>';
echo'session-status:', session_status(),'<br>';
/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
 
 require_once './biblio.inc.php';

$template='';
$kunde=login_check();

/*
 *  Ausgabe des Titels der Seite
 */
$titel='Kontakt Seite';

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');

/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $titel, $template);

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);



/*
 *  $erge = Seiten inhalte
 *  Anrede
 *  Nachname
 *  Vorname
 *  Telefon für rückfragen
 *  e-Mail adresse
 *  Textfeld für eingaben vom Kunden
 * 
 */
$erge='<div id="">
        
        <h1>Kontakt Seite</h1>
        <form action="kontakt.php" method="post">
            <h2></h2>
            <table id="kontakt_table1">
               <tr>
                <td id="">Anrede:</td> 
                <td id=""> 
                    <!-- durch die radio Bottons ist die Auswahl möglich -->
                    <input type="radio" name="anrede" value="female" required> Frau
                    <input type="radio" name="anrede" value="male" required> Herr
                    <input type="radio" name="anrede" value="neutral" required> -
                </td>
                </tr>
                <tr>
                    <td id="kontakt">Nachname:</td><td><input id="kontakt" type="text" size="20" name="nachname" value="Müller"></td>
                </tr> 
                <tr>
                    <td id="kontakt">Vorname:</td><td><input id="kontakt" type="text" size="20" name="vorname" value="Tina"></td>
                </tr>  
                <tr>
                    <td id="kontakt">Telefon für rückfragen:</td><td><input id="kontakt" type="text" size="20" name="telefon" value="0421554321"></td>
                </tr>  
                <tr> 
                    <td id="kontakt">e-Mail adresse:</td><td><input id="kontakt" type="text" size="20" name="e-mail" value="tina.mueller@gmx.de"><br></td>
                </tr>  
                </table>
                <table id="kontakt_table">
                <tr>
                    <div id="kontakt_Infozeile">Sie haben eine frage bzw. Anmerkung oder anderes anliegen zu unseren Produkten:</div>
                    <textarea cols="85" rows="10" name="email_nachricht">Bitte geben Sie hier ihr Anliegen ein.</textarea> 
                    <br><!--text bereich zwischen den Textarea zeichen -->
                </tr>   
            </table>
            <!-- Abschicken der Daten zur weinhandel-email ( ) -->
            <input type="submit" value="abschicken">
        </form>
    </div>';     
       
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
