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
 *  Ausgabe des Titels der Seite
 */
$titel = 'regestrierung';
/*
 *  Ausgabe des Titels der Seite
 */
$template = str_replace('{title}', $titel, $template);
$kunde_Info = '';
/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde_Info, $template);
/*
 *  $regestrierung_container = Seiten inhalte
 */
$regestrierung_container = '<div id="main">
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
                </tr> '; 
if($_SESSION['id_benutzer'] == 'brief'){
                    $regestrierung_container .='<tr> 
                    <td id="registry"></td><td>Email existiert</td>
                </tr> ';
                  
                    
}
                $regestrierung_container .='<tr> 
                    <td id="registry">password:</td><td><input id="registry1" type="password" size="20" name="password" required="required" value="tanz"></td>
                </tr>  
                <tr>
                    <td id="registry">Password:</td><Td><input id="registry2" type="password" size="20" required="required" value="tanz"></td>
                </tr>
                <tr>
                    <td id="registry"></td><td id="erorr"></td>
                </tr>
                 <tr>
                    <td id="registry"><input class="button" type="submit" value="ändern"><input class="button" type="submit" value="regestrieren"></td>';
                if($_SESSION['id_benutzer'] !== 'brief'){
                    $regestrierung_container .='<td><a class="button" href="login.php">login</a></td>';
                    $_SESSION['id_benutzer'] =0;
                    
}
                    
                $regestrierung_container .='</tr>
                </table>   
        </form>     
       </div>';
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $regestrierung_container, $template);
/*
 * Seiten Ausgabe
 */
tpl_output();
?>
