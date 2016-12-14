<?php

/*
 * Server der Verwendung findet
 */
$_SERVER = 'localhost';
/*
 * Datenbank zugriff ( con db
 */

// database

function con_db() {
    $con = mysqli_connect('localhost', 'root', '');             //tauschen zu globalen variablen
    mysqli_set_charset($con, 'utf8');
    mysqli_select_db($con, 'weinhandel_test');
    return $con;
}

function uncon_db($con) {
    @mysqli_close($con);
}

function benutzer_EmailUndPassword_check($email, $password) {
    if (isset($email)) {
        $password_hash = md5($password);
        $con = con_db();
        $sql = 'SELECT id_benutzer,
                 vorname 
                 FROM benutzer
                 JOIN zugang ON benutzer.id_benutzer=zugang.benutzer_id 
                 WHERE (email=\'' . $email . '\' AND PASSWORD=\'' . $password_hash . '\');';
        $res = mysqli_query($con, $sql);
        $benutzer = mysqli_fetch_assoc($res);
        uncon_db($con);
        return $benutzer;
    }
}

function benutzer_Email_check($email) {
    if (isset($email)) {
        $con = con_db();
        $sql = 'SELECT id_benutzer,
                       email 
                 FROM benutzer
                 WHERE email=\'' . $email . ' \';';
        $res = mysqli_query($con, $sql);
        $benutzer = mysqli_fetch_assoc($res);
        uncon_db($con);
        return $benutzer;
    }
}

function login_check() {
    if (isset($_SESSION['id_benutzer']) && $_SESSION['id_benutzer'] > 0) {
        $kunde = '<div id="kunde"><a class="button" href="kundenkonto.inc.php?kunde=' . $_SESSION['id_benutzer'] . '">'
                . $_SESSION['vorname']
                . '</a><a class="button" href="logout.php">logout</a><a class="button" href="warenkorb.php">Warenkorb</a></div>';
    } else {
        $kunde = '<div id="kunde"><a class="button" href="login.php">login</a><a class="button" href="regestrierung.php">regestrierung</a></div>';
    }

    return $kunde;
}

function list_output() {
    global $_POST;
    $filter_in=$_POST;
    $con = con_db();
    $filter = filtrator($filter_in);
    $list = filter_div($filter_in);
    $sql = 'SELECT id_produkt,produkt_nummer,produkt_name,produkt_beschr,produkt_preis,LOWER(land_id) AS land_id,land_name,produkt_volumen'
            . ' FROM produkt p JOIN '
            . 'weintyp w ON p.weintyp_id=w.id_weintyp JOIN weingut wg ON '
            . 'p.weingut_id=wg.id_weingut JOIN laender l ON wg.land_id=l.id_land JOIN region r ON'
            . ' wg.region_id=r.id_region JOIN kontinent k ON l.kontinent_id=k.id_kontinent'.$filter.' LIMIT 20';
    // echo $sql;

    $res = mysqli_query($con, $sql);
    while ($zeil = mysqli_fetch_assoc($res)) {
        $list .= '<div class="pro">';

        //bild
        $list .= '<div class="bildUndName">';
        $list .= '<img src="images/weinbilder/klein/w'
                . $zeil['produkt_nummer']
                . '.jpg" onerror="this.src=\'images/weinbilder/klein/blank.jpg\' ">';


        //name und kürzbeschreibung
        $list .= '<a href="detail.php?id='
                . $zeil['produkt_nummer'] . '"></div>'
                . '<div class="nameundtext">' . $zeil['produkt_name'] . '</a>'
                . '<img class="l_flag" src="images/flags/1x1/' . $zeil['land_id'] . '.svg" '
                . 'title="' . $zeil['land_name'] . '"><br>'
                . '<div class="beschreib">' . $zeil['produkt_beschr'] . '</div>'
                . '<div class="liter">' . $zeil['produkt_volumen'] . ' Liter</div>';
        $list .= '</div>';
        //Preis,Menge und Warenkorp
        $list .= gen_div_insertINwarenkorp($zeil['produkt_preis'],$zeil['id_produkt'],$zeil['produkt_nummer']);
    }
    
    /*
     * Datenbank schließung
     */
    uncon_db($con);
    return $list;
}

function gen_div_insertINwarenkorp($produkt_preis,$id_produkt,$produkt_nummer) {
        $list='<form action="./warenkorb.php" method="GET"><div class="mengeUndWarenkorp"><br>';
        $list.='<input type="hidden" name="add_preis" value="'.$produkt_preis.'">'.$produkt_preis.'€/stück';
        $list.='<input type="hidden" name="add_id" value="'.$id_produkt.'">';
        $list.='<input type="submit" class="warenkorp" value="Warenkorb">';
        $list.='<input type="button" class="operation" value="-" onclick="operation(\'-\','.$produkt_nummer . ')">';
        $list.=' <input type="text" name="add_menge" id="'.$produkt_nummer.'" size="3" value="1" onkeyup="menge_pruefen('.$produkt_nummer.')">';
        $list.= '<input type="button" class="operation" value="+" onclick="operation(\'+\','.$produkt_nummer.')">';
        $list.= '</form></div></div>';
    return $list;
}





/*
 *   Load des template
 */
//template
function load_tpl($load) {
    global $template;
    $template = file_get_contents($load);
}

/*
 * Template Ausgabe
 */
function tpl_output() {
    global $template;
    echo $template;
}


















































































//detail_seite sascha

function display_detail() {
    $id = $_GET['id'];
    $con = con_db();
    $sql = 'SELECT produkt_nummer,produkt_name,produkt_text,produkt_preis,'
            . 'land_name,name_weintyp,name_region,name_weingut,'
            . 'produkt_volumen,LOWER(land_id) AS land_id '
            . 'FROM produkt '
            . 'JOIN weingut ON weingut_id=id_weingut '
            . 'JOIN laender ON id_land = land_id '
            . 'JOIN weintyp ON id_weintyp=weintyp_id '
            . 'JOIN region ON id_region=region_id '
            . ' WHERE produkt_nummer = \'' . $id . '\';';
    $res = mysqli_query($con, $sql);
    $detail = '';
    while ($d_bild = mysqli_fetch_assoc($res)) {
        $detail .= '<div class="detail">';
        
        $detail .= '<a href="images/weinbilder/gross/w'


        
                . $d_bild['produkt_nummer']
                . '.jpg" rel="lightbox" title="'.$d_bild['produkt_name'].'" onerror="this.src=\'images/weinbilder/gross/blank.jpg\'">'
                . '<img class="detail_bild" src="images/weinbilder/mittel/w'.$d_bild['produkt_nummer'].'.jpg" '
                . 'onerror="this.src=\'images/weinbilder/mittel/blank.jpg\'"></a>';
        $detail .= '<h2 class="detail_name">' . $d_bild['produkt_name'] . '</h2>'
                . '<img class="d_flag" src="images/flags/4x3/' . $d_bild['land_id'] . '.svg"'
                . 'title="' . $d_bild['land_name'] . '">';
        $detail .= '<div class="kategorie"><h4>Weintyp</h4>: ' . $d_bild['name_weintyp'] . ''
                . ', <h4> Region: </h4>' . $d_bild['name_region'] . ', <h4> Weingut: </h4>' . $d_bild['name_weingut'] . '</div>';
        $detail .= '<br><div class="detail_text">' . $d_bild['produkt_text'] . '<br>'
                . $d_bild['produkt_volumen'] . ' Liter</div>';
        $detail .= '<div class="detail_waren"><br>';
        $detail .= $d_bild['produkt_preis'] . ' €/stück';
        if(isset($_SESSION['id_benutzer'])) {
               if ($_SESSION['id_benutzer'] == '1'){
            $detail .= '';
            $detail .= ' <a href="admin.php?id='.$d_bild['produkt_nummer'].'"><input type="button" class="warenkorp" value="bearbeiten"></a>';
            $detail .= ' <input type="button" class="warenkorp" value="zurück" onClick="history.back()">';
        }
        }
        else {
        $detail .= ' <input type="button" class="warenkorp" value="Warenkorb">';
        $detail .= ' <input type="button" class="warenkorp" value="zurück" onClick="history.back()">';
        $detail .= '<input type="button" class="operation" value="-" onclick="operation(\'-\','
                . $d_bild['produkt_nummer'] . ')">';
        $detail .= ' <input type="text" name="menge" id="'
                . $d_bild['produkt_nummer']
                . '" size="3" value="1" onkeyup="menge_pruefen('
                . $d_bild['produkt_nummer'] . ')">';
        $detail .= '<input type="button" class="operation" value="+" onclick="operation(\'+\','
                . $d_bild['produkt_nummer'] . ')">';
        }

        $detail .= '</div>';
        $detail .= '</div>';
    }

    return $detail;
}

function generate_add_warenkorb_button($id_produkt) {
    $button='<button value="Warenkorb" a href="./warenkorb.php?add_id='.$id_produkt.'">';
    $button.='<img height="20" width="20" src="./images/icons/delete.png" alt="Artikel löschen"></a>';
    return $button;
}

//email senden mit id_benutzer                              //TODO email server konfigurieren

function email2benutzer($id_benutzer, $action) {
    $empfaenger = holab($id_benutzer, 'email');

    switch ($action) {
        case "aktivation" :
            require_once './html_emails/aktivation.php';
            break;
        case "kennwort" :
            require_once './html_emails/kennwort.php';
            break;
        case "bestelung" :
            require_once './html_emails/bestelung.php';
            break;
        case "formular" :
            require_once './html_emails/formular.php';
            break;
    }
    $header = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1\r\n";

    $header .= "From: $absender\r\n";
    // $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
    $header .= "X-Mailer: PHP " . phpversion();

    echo mail($empfaenger, $betreff, $text, $header);  //zu email testen schrein echo vor der funktion mail
    // bei dem output 1 war email geschickt
}

//holt benutzer daten aus datenbank ab (kann auch kennwort abholen) $was kann zb. vorname, nachname, anrede... sein.
function holab($id_benutzer, $was) {
    $con = con_db();
    $sql = 'SELECT ' . $was . ' FROM benutzer JOIN zugang ON benutzer.zugang_id=zugang.id_zugang WHERE (id_benutzer=' . $id_benutzer . ')';
    $res = mysqli_query($con, $sql);
    $das = mysqli_fetch_assoc($res);
    return $das["$was"];
}

//funktion fur aktivieren benutzer konto, return 1 wenn konto aktiviert war
function konto_aktivation($id_benutzer) {
    $con = con_db();
    $sql = 'UPDATE benutzer SET email_aktiv=1 WHERE email_aktiv=0 AND id_benutzer = ' . $id_benutzer . ';';
    mysqli_query($con, $sql);
    if (mysqli_affected_rows($con) == 1) {
        uncon_db($con);
        return 1;                                           //TODO einstellen log
    }
    else {
        uncon_db($con);
        return 0;                                           //TODO einstellen log
    }
}

//generiert salz und macht sichers hash fur kennwort
function cryptKennwort($input, $runden = 9) {                                //TODO salz in datenbank speichern fur login_check
    $salz = "";
    $salzCharset = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
    for ($i = 0; $i < 22; $i++) {
        $salz .= $salzCharset[array_rand($salzCharset)];
    }
    return crypt($input, sprintf('$2y$%02d$', $runden) . $salz);
}

function search_feld() {
    $code = '
    <form action="liste.php" method="get">
    <input type="hidden" name="filter" value="1">        
    <input placeholder="Was mochtest du suchen..." type="search" value="" name="name" id="search">
    <input type="submit" value="Suchen">  
    </form>';
    return $code;
}

/*
 * Password Prüfung ob gleich oder nicht
 * 
 */
function password_vergleichen($pass1, $pass2) {
    if ($pass1 == $pass2) {
        return TRUE;
    } else {
        return FALSE;
    }
}

/*
 * Forumular Datums erzeugung
 * 
 */
function datumFormola_erzeugen($container) {
    $aktuell_datum_jahr = date("Y");
    
    /*
     * Setzen des Geburtsdatums ab 18 Jahre
     */
    $jahr = intval($aktuell_datum_jahr) - 18;
    
    /*
     * Setzen des Jahress
     */
    $container = '<select name="geburtsdatum_jahr">';
    for ($i = 1; $i < 112; $i++) {
        $container .= '<option value="' . $jahr . '" ';
        if (isset($_SESSION['geburtsdatum_jahr']) && $_SESSION['geburtsdatum_jahr'] == $jahr) {
            $container .= ' selected="selected" ';
        }
        $container .= '>' . $jahr . '</option>';
        $jahr--;
    }
    $container .= '</select>';

    /*
     * Setzen des Monats
     */
    $container .= '<select name="geburtsdatum_monat">';
    for ($i = 1; $i < 13; $i++) {
        $container .= '<option value="' . $i . '" ';
        if (isset($_SESSION['geburtsdatum_monat']) && $_SESSION['geburtsdatum_monat'] == $i) {
            $container .= ' selected="selected" ';
        }
        $container .= '>' . $i . '</option>';
    }
    $container .= '</select>';

    /*
     * Setzen des Tages
     */
    $container .= '<select name="geburtsdatum_tag">';
    for ($i = 1; $i <= 31; $i++) {
        $container .= '<option value="' . $i . '" ';
        if (isset($_SESSION['geburtsdatum_tag']) && $_SESSION['geburtsdatum_tag'] == $i) {
            $container .= ' selected="selected" ';
        }
        $container .= '>' . $i . '</option>';
    }
    $container .= '</select>';
    return $container;
}

/*
 *  Prüfung der Session Anrede ob gesetzt oder nicht gesetzt 
 *  Prüfung der Session Geschlecht ob gesetzt oder nicht gesetzt 
 *  wenn nicht gestezt = leer
 */
function Checked_Anrede_setzen($container, $Geschlecht) {
    if (isset($_SESSION['anrede']) && $_SESSION['anrede'] == $Geschlecht) {
        $container = '  checked="checked" ';
    } else {
        $container = '';
    }
    return $container;
}

/*
 *  Wert von Session setzen ($container) wenn sie vorhanden ist
 *  wenn nicht dann lasse den ($container) leer
 *  rückgabe wert = return $container
 */
function Value_Von_Session_setzen($container, $Element_Name) {
    if (isset($_SESSION[$Element_Name])) {
        $container = $_SESSION[$Element_Name];
    } else {
        $container = '';
    }
    return $container;
}

/*
 *  Prüfung der eingabe Forumlare auf richtigkeit und Verinderung der Falscheingabe
 */
function Element_inArryFehler_Suchen($container, $element,$fehler) {
    if (preg_match("$element", $fehler) == 1) {
        $element=  trim($element, '/');
        if ($element == "Email") {
            $container = $element . ' existiert';
        } else {
            $container = $element . ' ist falsch';
        }
    } else {
        $container = '';
    }
    return $container;
}
