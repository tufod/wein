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
if (!isset($_SESSION['id_benutzer'])) {
    $_SESSION['id_benutzer'] = 0;
}
if (isset($_SESSION['fehler'])) {
    $fehler = $_SESSION['fehler'];
} else {
    $fehler = '';
}
$regestrierung_container = '<div id="kunden_registry_main">
        <h1>Benutzer Registrierung</h1>
        <h2>Registrieren sie sich bitte hier mit ihren Persönlichen Daten</h2>
        <form action="regestrierung_check.inc.php" method="post">
            <table id="kunden_registry_table">
               <tr>
                  <td id="registry">
                  Anrede:
                  </td> 
                <td id="registry"> 
                <!-- durch die radio Bottons ist die Auswahl möglich -->
                <input type="radio" name="anrede" value="Frau" required ';
$regestrierung_container .= Checked_Anrede_setzen($regestrierung_container, 'Frau');
$regestrierung_container .= '> Frau
                <input type="radio" name="anrede" selected  value="Herr" required  ';
$regestrierung_container .= Checked_Anrede_setzen($regestrierung_container, 'Herr');
$regestrierung_container .= '> Herr              
                </td>
                <td>
                </td>
                </tr>
                <tr>
                    <td id="registry">
                    Nachname:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="nachname" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'nachname');
$regestrierung_container .= '" required="required" >
                    </td>                    
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Nachname/",$fehler);
$regestrierung_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    Vorname:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="vorname" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'vorname');

$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Vorname/",$fehler);
$regestrierung_container .= '</td>
                </tr>  
                <tr>
                <tr> 
                    <td id="registry">
                    Geburtsdatum:
                    </td>
                    <td>';

$regestrierung_container .= datumFormola_erzeugen($regestrierung_container);
$regestrierung_container .= '</td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Geburtsdatum/",$fehler);
$regestrierung_container .= '</td>
                </tr>
                <tr>
                    <td id="registry">
                    Strasse:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="strasse" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'strasse');
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Strasse/",$fehler);
$regestrierung_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Hausnummer:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="hausnummer" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'hausnummer');
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Hausnummer/",$fehler);
$regestrierung_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Ort:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="ort" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'ort');
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Ort/",$fehler);
$regestrierung_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    Plz:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="plz" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'plz');
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Plz/",$fehler);
$regestrierung_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Telefon für rückfragen:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="telefon" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'telefon');
$regestrierung_container .= '">
                    </td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Telefon/",$fehler);
$regestrierung_container .= '</td>
                </tr>  
                <tr> 
                    <td id="registry">
                    e-Mail adresse:
                    </td>
                    <td>
                    <input id="registry" type="email" size="20" name="email" value="';
$regestrierung_container .= Value_Von_Session_setzen($regestrierung_container, 'email');
$regestrierung_container .= ' " required="required" >
                    </td>
                    <td>';
$regestrierung_container .= Element_inArryFehler_Suchen($regestrierung_container, "/Email/",$fehler);
$regestrierung_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    password:
                    </td>
                    <td>
                    <input id="registry1" type="password" size="20" name="password1" required="required" value="">
                    </td>
                    <td>
                    </td>
                </tr>  
                <tr>
                    <td id="registry">
                    Password:
                    </td>
                    <td>
                    <input id="registry2" type="password" size="20" name="password2" required="required" value="">
                    </td>
                    <td>';
if (preg_match("/Password/", $fehler) == 1) {
    $regestrierung_container .= 'password nicht gleich ';
}
$regestrierung_container .= '</td>
                </tr>
                <tr>
                <td>
                </td>
                    <td id="registry">
                    <input class="button" type="submit" id="registry_button" value="regestrieren">
                    </td>';
if (preg_match("/Email/", $fehler) == 1) {
    $regestrierung_container .= '<td><a class="button" href="login.php">login</a></td>';
}
$regestrierung_container .= '</tr>
                </table>   
        </form>     
    </div>';
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$_SESSION['fehler'] = '';
$template = str_replace('{container}', $regestrierung_container, $template);
/*
 * Seiten Ausgabe
 */
tpl_output();
?>
