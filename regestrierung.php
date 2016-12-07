<?php
/*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
session_start();
/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */

  
  require_once './biblio.inc.php';
  
  
$template='';
$kunde=login_check();

/*
 *  Ausgabe des Titels der Seite
 */
$titel='regestrierung';

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl'); 


$kunde='';


/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);

/*
 *  $erge = Seiten inhalte
 */
$erge='<div id="main">
        <h1>Registrierung</h1>
        <form action="regestrierung_check.inc.php" method="post">
            <table id="registry_table">
               <tr>
                <td id="registry">Anrede:</td> <td id="registry"> 
                <!-- durch die radio Bottons ist die Auswahl möglich -->
                <input type="radio" name="anrede" value="female" required> Frau
                <input type="radio" name="anrede" value="male" required> Herr
                <input type="radio" name="anrede" value="neutral" required> -
                </td>
                </tr>
                <tr>
                    <td id="registry">Nachname:</td><td><input id="registry" type="text" size="20" name="nachname" value="Müller" required="required" ></td>
                </tr> 
                <tr>
                    <td id="registry">Vorname:</td><td><input id="registry" type="text" size="20" name="vorname" value="Tina" required="required" ></td>
                </tr>  
                <tr>
                <tr> 
                    <td id="registry">Geburtsdatum:</td><td></td>
                </tr>
                <tr>
                    <td id="registry">Strasse:</td><td><input id="registry" type="text" size="20" name="strasse" value="Bürgermeister-Smidt-Str." required="required" ></td>
                </tr>  
                <tr>
                    <td id="registry">Hausnummer:</td><td><input id="registry" type="text" size="20" name="hausnummer" value="31" required="required" ></td>
                </tr>  
                <tr>
                    <td id="registry">Ort:</td><td><input id="registry" type="text" size="20" name="ort" value="Bremen" required="required" ></td>
                </tr> 
                <tr>
                    <td id="registry">Plz:</td><td><input id="registry" type="text" size="20" name="plz" value="28195" required="required" ></td>
                </tr>  
                <tr>
                    <td id="registry">Telefon für rückfragen:</td><td><input id="registry" type="text" size="20" name="telefon" value="0421554321"></td>
                </tr>  
                <tr> 
                    <td id="registry">e-Mail adresse:</td><td><input id="registry" type="email" size="20" name="email" value="khaled@hotmail.com" required="required" ></td>
                </tr>  
                <tr> 
                    <td id="registry">password:</td><td><input id="registry1" type="password" size="20" name="password" required="required" value="tanz"></td>
                </tr>  
                <tr>
                    <td id="registry">Password:</td><Td><input id="registry2" type="password" size="20" required="required" value="tanz"></td>
                </tr>
                <tr>
                    <td id="registry"></td><td id="erorr"></td>
                </tr>
                 <tr>
                    <td id="registry"><input class="button" type="submit" value="ändern"><input class="button" type="submit" value="regestrieren"></td>
                    
                </tr>
                </table>
               
        </form>     
       </div>';

$template = str_replace('{kunde}', $kunde, $template);
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $regestr, $template);
$template = str_replace('{container}', $erge, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();
?>
