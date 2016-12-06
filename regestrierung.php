  <?php  
  session_start();
// session_set_cookie_params($lifetime=3);
//session_status(2);
echo'Session-Name:',session_name(),'<br>';
echo'Session-ID (SID):',session_id(),'<br>';
// echo'session-LifeTime:', session_set_cookie_params(),'<br>';
echo'session-status:', session_status(),'<br>';
  
  require_once './biblio.inc.php';
$template='';
$titel='regestrierung';
load_tpl('wein.tpl');
$erge='<div id="main">
        <h1>Registrierung</h1>
        <form action="login.php" method="post">
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
                    <td id="registry">e-Mail adresse:</td><td><input id="registry" type="text" size="20" name="e-mail" value="tina.mueller@gmx.de"></td>
                </tr>  
                <tr> 
                    <td id="registry">password:</td><td><input id="registry" type="text" size="20" name="password" value="tanz"></td>
                </tr>  
                <tr>
                    <td id="registry">Password:</td><Td><input id="registry" type="text" size="20" name="password" value="tanz"></td>
                </tr>
                 <tr>
                    <td id="registry"><input class="button" type="submit" value="ändern"><input class="button" type="submit" value="regestrieren"></td>
                </tr>
                </table>
               
        </form>     
       </div>';
$template = str_replace('{continer}', $erge, $template);
tpl_output();
?>
