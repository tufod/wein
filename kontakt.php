<?php
 /*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
  session_start();

/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
 
 require_once './biblio.inc.php';
 /*
 *  Link zuweisung CSS
 */


$template='';
$kunde=login_check();

/*
 *  Ausgabe des Titels der Seite
 */
$titel='Kontakt Seite';

/*
 *  Style CSS Angabe für die kontakt Seite 
 */
$style='<link rel="stylesheet" href="./styles/kunden_kontakt.css" media="screen">';


/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');

/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $titel, $template);

/*
 *  CSS für die kontakt übergabe an wein Tamplate {style} 
 */
$template = str_replace('{style}', $style, $template);

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
$erge='<div id="kunden_kontakt_main">
        
        <h1>Kontakt Seite</h1>
        <form action="kontakt.php" method="post">
            <h2></h2>
            <table id="kunden_kontakt_table">
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
                <table id="kunden_kontakt_table1">
                <tr>
                    <div id="kunden_kontakt_Infozeile">
                    Sie haben eine frage bzw. Anmerkung oder anderes anliegen zu unseren Produkten:</div>
                    <textarea cols="85" rows="10" name="email_nachricht">Bitte geben Sie hier ihr Anliegen ein.</textarea> 
                    <br><!--text bereich zwischen den Textarea zeichen -->
                </tr>   
                                    
            </table>
            
<!-- Abschicken der Daten zur weinhandel-email ( ) -->
 <input type="submit" id="kontakt_button" value="abschicken">
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
