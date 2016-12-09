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
$regestrierung_container = '<div id="kunden_registry_main">
        <h1>Benutzer Registrierung</h1>
        <h2>Bitte Registrieren sie sich bitte hier mit ihren Persönlichen Daten</h2>
        <form action="regestrierung_check.inc.php" method="post">
            <table id="kunden_registry_table">
               <tr>
                  <td id="registry">
                  Anrede:
                  </td> 
                <td id="registry"> 
                <!-- durch die radio Bottons ist die Auswahl möglich -->
                <input type="radio" name="anrede" value="female" required ';
if (isset($_SESSION['regestierung']['anrede']) && $_SESSION['regestierung']['anrede'] == 'female') {
    $regestrierung_container .= '  checked="checked" ';
}

$regestrierung_container .= '> Frau
                <input type="radio" name="anrede" selected  value="male" required  ';
if (isset($_SESSION['regestierung']['anrede']) && $_SESSION['regestierung']['anrede'] == 'male') {
    $regestrierung_container .= '  checked="checked" ';
}


$regestrierung_container .= '> Herr
                <input type="radio" name="anrede" value="neutral" required  ';
if (isset($_SESSION['regestierung']['anrede']) && $_SESSION['regestierung']['anrede'] == 'neutral') {
    $regestrierung_container .= '  checked="checked" ';
}


$regestrierung_container .= '> Firma
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
if (isset($_SESSION['regestierung']['nachname'])) {
    $regestrierung_container .= $_SESSION['regestierung']['nachname'];
}

$regestrierung_container .= '" required="required" >
                    </td>                    
                    <td>';
$fehler = $_SESSION['id_benutzer'];
//var_dump($_SESSION);
if (preg_match("/nachname_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'nachname falsch';
}

$regestrierung_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    Vorname:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="vorname" value="';
if (isset($_SESSION['regestierung']['vorname'])) {
    $regestrierung_container .= $_SESSION['regestierung']['vorname'];
}

$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
if (preg_match("/vorname_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'vorname falsch';
}



$regestrierung_container .= '</td>
                </tr>  
                <tr>
                <tr> 
                    <td id="registry">
                    Geburtsdatum:
                    </td>
                    <td>';
$aktuell_datum_jahr = date("Y");
$jahr = intval($aktuell_datum_jahr) - 17;
$regestrierung_container .= '<select name="geburtsdatum_jahr">';
for ($i = 1; $i < 112; $i++) {
    $regestrierung_container .= '<option value="' . $jahr-- . '" ';
    if (isset($_SESSION['regestierung']['geburtsdatum_jahr']) && $_SESSION['regestierung']['geburtsdatum_jahr'] == $jahr) {
        $regestrierung_container .= ' selected="selected" ';
    }
    $regestrierung_container .= '>' . $jahr . '</option>';
}
$regestrierung_container .= '</select>';
$regestrierung_container .= '<select name="geburtsdatum_monat">';
for ($i = 1; $i < 13; $i++) {
    $regestrierung_container .= '<option value="' . $i . '" ';
    if (isset($_SESSION['regestierung']['geburtsdatum_monat']) && $_SESSION['regestierung']['geburtsdatum_monat'] == $i) {
        $regestrierung_container .= ' selected="selected" ';
    }
    $regestrierung_container .= '>' . $i . '</option>';
}
$regestrierung_container .= '</select>';
$regestrierung_container .= '<select name="geburtsdatum_tag">';
for ($i = 1; $i <= 31; $i++) {
    $regestrierung_container .= '<option value="' . $i . '" ';
    if (isset($_SESSION['regestierung']['geburtsdatum_tag']) && $_SESSION['regestierung']['geburtsdatum_tag'] == $i) {
        $regestrierung_container .= ' selected="selected" ';
    }
    $regestrierung_container .= '>' . $i . '</option>';
}
$regestrierung_container .= '</select>';
$regestrierung_container .= '</td>
                    <td>
                    </td>
                </tr>
                <tr>
                    <td id="registry">
                    Strasse:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="strasse" value="';
if (isset($_SESSION['regestierung']['strasse'])) {
    $regestrierung_container .= $_SESSION['regestierung']['strasse'];
}
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
if (preg_match("/strasse_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'strasse falsch';
}


$regestrierung_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Hausnummer:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="hausnummer" value="';
if (isset($_SESSION['regestierung']['hausnummer'])) {
    $regestrierung_container .= $_SESSION['regestierung']['hausnummer'];
}
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
if (preg_match("/hausnummer_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'hausnummer falsch';
}



$regestrierung_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Ort:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="ort" value="';
if (isset($_SESSION['regestierung']['ort'])) {
    $regestrierung_container .= $_SESSION['regestierung']['ort'];
}
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';
if (preg_match("/ort_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'ort falsch';
}


$regestrierung_container .= '</td>
                </tr> 
                <tr>
                    <td id="registry">
                    Plz:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="plz" value="';
if (isset($_SESSION['regestierung']['plz'])) {
    $regestrierung_container .= $_SESSION['regestierung']['plz'];
}
$regestrierung_container .= '" required="required" >
                    </td>
                    <td>';

if (preg_match("/plz_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'plz falsch';
}

$regestrierung_container .= '</td>
                </tr>  
                <tr>
                    <td id="registry">
                    Telefon für rückfragen:
                    </td>
                    <td>
                    <input id="registry" type="text" size="20" name="telefon" value="';
if (isset($_SESSION['regestierung']['telefon'])) {
    $regestrierung_container .= $_SESSION['regestierung']['telefon'];
}
$regestrierung_container .= '">
                    </td>
                    <td>';
if (preg_match("/telefon_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'telefon falsch';
}


$regestrierung_container .= '</td>
                </tr>  
                <tr> 
                    <td id="registry">
                    e-Mail adresse:
                    </td>
                    <td>
                    <input id="registry" type="email" size="20" name="email" value="';
if (isset($_SESSION['regestierung']['email'])) {
    $regestrierung_container .= $_SESSION['regestierung']['email'];
}
$regestrierung_container .= ' " required="required" >
                    </td>
                    <td>';
if (preg_match("/email_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'Email existiert ';
}
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
if (preg_match("/password_falsch/", $fehler) == 1) {
    $regestrierung_container .= 'password nicht gleich ';
}



$regestrierung_container .= '</td>
                </tr>
                <tr>
                    <td id="registry">
                    <input class="button" type="submit" id="aendern_button" value="ändern">
                    <input class="button" type="submit" id="registry_button" value="regestrieren">
                    </td>';

if (preg_match("/email_falsch/", $fehler) == 1) {
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
$_SESSION['id_benutzer'] = 0;
$template = str_replace('{container}', $regestrierung_container, $template);
/*
 * Seiten Ausgabe
 */
tpl_output();
?>
