 <?php
 
    '<div id="main">
        <h1>Registrierung</h1>
        <form action="login.php" method="post">
            <table>
               <tr>
                <td id="registry">Anrede:</td> <td id="registry"><select size="1"> 
                <!-- durch size wird es eine offene Liste -->
                <!-- durch multiple eine mehrfach auswahl möglich -->
           
                <option size="20" >Frau</option>
                <option size="20" >Herr</option> <!-- Listenfelder -->
                <option size="20" >-</option>
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
                    <td id="registry">Firmname:</td><td><input id="registry" type="text" size="20" name="firma" value="-"></td>
                </tr>
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
                </table>
            <input class="button" type="submit" value="registry">
        </form>     
        <a class="button" href="#">änderung</a>
        <a class="button" href="index.php">regestrierung</a>
    </div>'
?>
