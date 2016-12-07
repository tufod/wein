<?php
$_SERVER='localhost';
// database

function con_db() {
    $con = mysqli_connect('localhost', 'root', '');
    mysqli_set_charset($con, 'utf8');
    mysqli_select_db($con, 'weinhandel_test');
    return $con;
}

function uncon_db($con) {
    @mysqli_close($con);
}

function benutzer_EmailUndPassword_check($email, $password) {
    if (isset($email)) {
        $con = con_db();
        $sql = 'SELECT id_benutzer,
                 anrede,
                 vorname,
                 nachname,
                 geburtsdatum,
                 telefon,
                 email,
                 lief_adresse_id,
                 rech_adresse_id
                 FROM benutzer
                 JOIN zugang ON benutzer.zugang_id=zugang.id_zugang
                 WHERE (email=\'' . $email . '\' AND PASSWORD=\'' . $password . '\');';
        $res = mysqli_query($con, $sql);
        $benutzer = mysqli_fetch_assoc($res);
        uncon_db($con);
        return $benutzer;
    }
}
function benutzer_Email_check($email) {
    if (isset($email)) {
        $con = con_db();
        $sql = 'SELECT id_benutzer,email
                 FROM benutzer
                 WHERE email=\'' . $email .' \';';
        $res = mysqli_query($con, $sql);
        $benutzer = mysqli_fetch_assoc($res);
        uncon_db($con);
        return $benutzer;
    }
}

function login_check() {
    if (isset($_SESSION['id_benutzer'])) {
        $kunde = '<div id="kunde"><a class="button" href="#">'
                . $_SESSION['vorname']
                . '</a><a class="button" href="#">logout</a><a class="button" href="#">Warenkorp</a></div>';
    } else {
        $kunde = '<div id="kunde"><a class="button" href="login.php">login</a><a class="button" href="regestrierung.php">regestrierung</a></div>';
    }
    
    return $kunde;
}
function list_output($table) {
    $con = con_db();
    if ($table == 'produkt') {
        $sql = 'SELECT produkt_nummer,produkt_name,produkt_beschr,produkt_preis FROM produkt';
    } else {
        
    }

    $res = mysqli_query($con, $sql);
    $list = '';
    while ($zeil = mysqli_fetch_assoc($res)) {
        $list .= '<div class="pro">';

        //bild
        $list .= '<div class="bildUndName">';
        $list .= '<img src="images/weinbilder/klein/w'
                . $zeil['produkt_nummer']
                . '.jpg" onerror="this.src=\'images/weinbilder/klein/blank.jpg\' ">';


        //name und kürzbeschreibung
        $list .= '<a href="detail.php?id='
                . $zeil['produkt_nummer'].'">'
                . $zeil['produkt_name'].'</a><br>'
                . $zeil['produkt_beschr'];
        $list .= '</div>';
        //Preis,Menge und Warenkorp
        $list .= '<div class="mengeUndWarenkorp"><br>';
        $list .= $zeil['produkt_preis'] . ' €/stück';
        $list .= ' <input type="button" class="warenkorp" value="warenkorp">';
        $list .= '<input type="button" class="operation" value="-" onclick="operation(\'-\','
                . $zeil['produkt_nummer'] . ')">';
        $list .= ' <input type="text" name="menge" id="'
                . $zeil['produkt_nummer']
                . '" size="3" value="1" onkeyup="menge_pruefen('
                . $zeil['produkt_nummer'] . ')">';
        $list .= '<input type="button" class="operation" value="+" onclick="operation(\'+\','
                . $zeil['produkt_nummer'] . ')">';

        $list .= '</div>';
        $list .= '</div>';
    }
    uncon_db($con);
    return $list;
}

//template
function load_tpl($load) {
    global $template;
    $template = file_get_contents($load);
}

function tpl_output() {
    global $template;
    echo $template;
}
//detail_seite sascha
function display_detail() {
    $id = $_GET['id'];
    $con = con_db();
    $sql = 'SELECT produkt_nummer,produkt_name,produkt_text,produkt_preis FROM produkt'
            .' WHERE produkt_nummer = \''.$id.'\';';
    $res = mysqli_query($con, $sql);
    $detail = '';
    while ($d_bild = mysqli_fetch_assoc($res)) {
        $detail.= '<div class="detail">';
        $detail.='<img class="detail_bild" src="images/weinbilder/mittel/w'
                . $d_bild['produkt_nummer']
                . '.jpg" onerror="this.src=\'images/weinbilder/mittel/blank.jpg\' ">';
        $detail.='<h2 class="detail_name">'.$d_bild['produkt_name'].'</h2>';
        $detail.='<br><div class="detail_text">'.$d_bild['produkt_text'].'</div><br>';
        $detail.= '<div class="detail_waren"><br>';
        $detail.= $d_bild['produkt_preis'] . ' €/stück';
        $detail.= ' <input type="button" class="warenkorp" value="warenkorp">';
        $detail.= ' <input type="button" class="warenkorp" value="zurück">';
        $detail.= '<input type="button" class="operation" value="-" onclick="operation(\'-\','
                . $d_bild['produkt_nummer'] . ')">';
        $detail.= ' <input type="text" name="menge" id="'
                . $d_bild['produkt_nummer']
                . '" size="3" value="1" onkeyup="menge_pruefen('
                . $d_bild['produkt_nummer'] . ')">';
        $detail.= '<input type="button" class="operation" value="+" onclick="operation(\'+\','
                . $d_bild['produkt_nummer'] . ')">';

        $detail.= '</div>';
        $detail.= '</div>';
    }
    
    return $detail;
}

//warenkorb_check tomas

function warenkorb_id($benutzer) {
    if(!isset($_SESSION['warenkorb'])) {
       $con = con_db();
       $sql = 'SELECT id_warenkorb FROM warenkorb WHERE benutzer_id='.$benutzer.' AND ISNULL(rechung_id)';
       $res = mysqli_query($con, $sql);
       if (!mysqli_affected_rows($con)==0) {
       $warenkorb = mysqli_fetch_assoc($res); 
       $act_warenkorb=$warenkorb['id_warenkorb'];
       }
       else {
       $act_warenkorb=warenkorb_new($benutzer);
       }      
    }     
 return $act_warenkorb;
}

//warenkorb_new tomas

function warenkorb_new($benutzer) {
    $con = con_db();
    $sql = 'INSERT INTO warenkorb(benutzer_id) VALUES ('.$benutzer.')';
    mysqli_query($con, $sql);
    $id_warenkorb=mysqli_insert_id($con);
    return $id_warenkorb;
}

//email senden mit id_benutzer

function email2benutzer($benutzer,$action) {
    $empfaenger= holab($benutzer,'email');
    
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
    $header  = "MIME-Version: 1.0\r\n";
    $header .= "Content-type: text/html; charset=iso-8859-1\r\n";
 
    $header .= "From: $absender\r\n";
    // $header .= "Cc: $cc\r\n";  // falls an CC gesendet werden soll
    $header .= "X-Mailer: PHP ". phpversion();

    echo mail($empfaenger,$betreff,$text,$header);
}

//holt benutzer datene aus datenbank

function holab($benutzer,$was) {
    $con = con_db();
    $sql = 'SELECT '.$was.' FROM benutzer WHERE (id_benutzer='.$benutzer.')';
    $res=mysqli_query($con, $sql);
    $das=mysqli_fetch_assoc($res);
    return $das["$was"];
}

//
function konto_aktivation($benutzer) {
    $con = con_db();
    $sql = 'UPDATE benutzer SET email_aktiv=1 WHERE benutzer = '.$benutzer.';';
    mysqli_query($con, $sql);
 }
