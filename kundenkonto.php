<?php

/*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
session_start();
require_once './biblio.inc.php';

$template = '';
$kunde_Info = login_check();

/*
 *  Ausgabe des Titels der Seite
 */
$titel = 'Kunden Konto';

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
$template = str_replace('{kunde}', $kunde_Info, $template);
if (isset($_SESSION['fehler'])) {
    $fehler = $_SESSION['fehler'];
} else {
    $fehler = '';
}

/*
 *  $erge = Seiten inhalte
 */
$kundeKonto_container = '<div id="kunden_konto_main">
        
        <h1>Kunden Konto</h1>
    <div id="kunden_konto_leftside">
        <form action="kundenkonto.inc.php" method="post">       
            <h2>Haupt Adresse:</h2>
            <table id="registry_table1">
               <tr>
                <td id="">
                Anrede:
                </td>
                <td id=""> 
                <!-- durch die radio Bottons ist die Auswahl möglich -->
                <input type="radio" name="anrede" value="Frau" required ';
$kundeKonto_container .= Checked_Anrede_setzen($kundeKonto_container, 'Frau');
$kundeKonto_container .= '  required="required" > Frau
                <input type="radio" name="anrede" selected  value="Herr" required  ';
$kundeKonto_container .= Checked_Anrede_setzen($kundeKonto_container, 'Herr');
$kundeKonto_container .= '  required="required" > Herr             
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
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'nachname');
$kundeKonto_container .= '"  required="required" >
                    </td>
                    <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container, "/Nachname/",$fehler);
$kundeKonto_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    Vorname:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="vorname" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'vorname');
$kundeKonto_container .= '"  required="required" >
                    </td>
                    <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container, "/Vorname/",$fehler);
$kundeKonto_container .= '</td>
                </tr>  
                <tr>
                <tr> 
                    <td id="registry">
                    Geburtsdatum:
                    </td>
                    <td>';

$kundeKonto_container .= datumFormola_erzeugen($kundeKonto_container);
$kundeKonto_container .= '</td>
                    <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container, "/Geburtsdatum/",$fehler);
$kundeKonto_container .='</td>
                 </tr>
                </table>
                <h2>Rechnung Adresse:</h2>
                <table> 
                <tr>
                    <td id="registry">
                    Strasse:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="rechnung_strasse" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'rechnung_strasse');
$kundeKonto_container .= '"  required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Rechnung Strasse/",$fehler);
$kundeKonto_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Hausnummer:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="rechnung_hausnummer" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'rechnung_hausnummer');
$kundeKonto_container .= '" required="required" >
                        </td>
                <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Rechnung Hausnummer/",$fehler);
$kundeKonto_container .= '</td>               
               </tr>  
                <tr>
                    <td id="registry">
                    Ort:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="rechnung_ort" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'rechnung_ort');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Rechnung Ort/",$fehler);
$kundeKonto_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    Plz:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="rechnung_plz" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'rechnung_plz');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Rechnung Plz/",$fehler);
$kundeKonto_container .= '</td>
                </tr>  
                
                <tr>
                    <td id="registry">
                    Telefon für rückfragen:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="telefon" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'telefon');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Telefon/",$fehler);
$kundeKonto_container .= '</td>
                </tr>  
                <tr> 
                    <td id="registry">
                    e-Mail adresse:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="email" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'email');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Email/",$fehler);
$kundeKonto_container .= '</td>
                </tr>                  
            </table>
       

 <!-- Passwörter: Kunden Passwort änderungs Bereich -->
    
            <h3>Passwort:</h3>
            <table id="registry_table1">
                <tr> 
                    <td id="registry">
                    password:
                    </td>
                    <td>
                    <input id="registry" type="password" size="20" name="password1" value="">
                    </td>
                    <td>
                </td>
                </tr>  
                <tr>
                    <td id="registry">
                    Password:
                    </td>
                    <td>
                    <input id="registry" type="password" size="20" name="password2" value="">
                    </td>
                    <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Password/",$fehler);
$kundeKonto_container .= '</td>
                </tr>
                 
            </table>
       
    </div>
<!-- Aktive Bestellungen: Kunden Bestellungen die Akiv sind -->
    <div id="kunden_konto_rightside"> 
        <h2>Kunden Liefer Adresse:</h2>
        
            <table id="registry_table1">
                <tr>
                    <td id="registry">
                    Strasse:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="lieferung_strasse" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'lieferung_strasse');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Lieferung Strasse/",$fehler);
$kundeKonto_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Hausnummer:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="lieferung_hausnummer" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'lieferung_hausnummer');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Lieferung Hausnummer/",$fehler);
$kundeKonto_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Ort:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="lieferung_ort" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'lieferung_ort');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Lieferung Ort/",$fehler);
$kundeKonto_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    Plz:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="lieferung_plz" value="';
$kundeKonto_container .= Value_Von_Session_setzen($kundeKonto_container, 'lieferung_plz');
$kundeKonto_container .= '" required="required" >
                        </td>
                        <td>';
$kundeKonto_container .= Element_inArryFehler_Suchen($kundeKonto_container,"/Lieferung Plz/",$fehler);
$kundeKonto_container .= '</td>
                </tr>
                <tr>
                    <td id="registry">
                    <input class="button" type="submit" id="aendern_button" value="ändern">
                    </td>
                    <td>
                </td>
                </tr>
            </table>
            <h2>Aktuelle Bestellungen:</h2>
            <table id="registry_table1">
                <tr> 
                    <td id=""></td><td></td>
                </tr>  
                <tr>
                    <td id=""></td><td></td>
                </tr>
                 <tr>
                </tr>
            </table>
<!-- Abgeschlossene Bestellungen: Kunden Bestellungen die Abgeschlossen sind -->
       
            <h2>Abgeschlossene Bestellungen:</h2>
            <table id="registry_table1">
                <tr> 
                    <td id=""></td><td></td>
                </tr>  
                 <tr>
                </tr>
            </table>
        </form>
    </div>';
if (isset($_SESSION['fehler'])) {
    $_SESSION['fehler'] = '';
}
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $kundeKonto_container, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();
?>
