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
                </select></td>
                </tr>
                <tr>
                    <td id="registry">Nachname:</td><td><input id="registry" type="text" size="20" name="nachname" value="Müller"></td>
                </tr> 
                <tr>
                    <td id="registry">Vorname:</td><td><input id="registry" type="text" size="20" name="vorname" value="Tina"></td>
                </tr>  
                <tr>
                <tr> 
                    <td id="registry">Geburtsdatum:</td><td><input id="registry" type="text" size="20" name="geburtsdatum" value="24.08.1995"></td>
                </tr>
                <tr>
                    <td id="registry">Strasse:</td><td><input id="registry" type="text" size="20" name="strasse" value="Bürgermeister-Smidt-Str."></td>
                </tr>  
                <tr>
                    <td id="registry">Hausnummer:</td><td><input id="registry" type="text" size="20" name="hausnummer" value="31"></td>
                </tr>  
                <tr>
                    <td id="registry">Ort:</td><td><input id="registry" type="text" size="20" name="ort" value="Bremen"></td>
                </tr> 
                <tr>
                    <td id="registry">Plz:</td><td><input id="registry" type="text" size="20" name="plz" value="28195"></td>
                </tr>  
                <tr>
                    <td id="registry">Telefon für rückfragen:</td><td><input id="registry" type="text" size="20" name="telefon" value="0421554321"></td>
                </tr>  
                <tr> 
                    <td id="registry">e-Mail adresse:</td><td><input id="registry" type="email" size="20" name="email" value="khaled@hotmail.com"></td>
                </tr>  
                <tr> 
                    <td id="registry">password:</td><td><input id="registry1" type="password" size="20" name="password" value="tanz"></td>
                </tr>  
                <tr>
                    <td id="registry">Password:</td><Td><input id="registry2" type="password" size="20" value="tanz"></td>
                </tr>
                 <tr>
                    <td id="registry"><input class="button" type="submit" value="ändern"><input class="button" type="submit" value="regestrieren" onclick="password_vergleichung()></td>
                    <script type="text/javascript" src="javascript_biblio.js"></script>
                </tr>
                </table>
               
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
