   <?php  
   /*
    *  zusätzliche datei die benötigt wird zum ausführen der Seite
    */
  require_once './biblio.inc.php';
$template='';
/*
 *  Titel der Seite
 */
$titel='Login';

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');
/* 
 * Login Überschrift
 * eMail Adress Zeile
 * Password eingabe Feld
 * Password Check Feld
 *  */
$erge='<div id="main">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <table>
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
                    <td id="registry"><input class="button" type="submit" value="Login"></td>
                </tr>
            </table> 
               
            <table>
                <tr> 
                    <td id="registry">Sie sind noch nicht Regestriert dann gehen sie bitte zur <a class="button" href="regestrierung.php">Regestrierung</a></td>
                </tr>
                <tr>
                    <td id="registry"> Sie haben ihr password Vergessen dann bitte hier  <a class="button" href="#">Passwort Anfordern</a></td>
                </tr>   
            </table>
        </form>
       </div>';
/*
 *   Load des container inhaltes
 */
$template = str_replace('{continer}', $erge, $template);
tpl_output();
?>
