<?php
$_SERVER='localhost';
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
    if (isset($_SESSION['id_benutzer']) && $_SESSION['id_benutzer']>0) {
        $kunde = '<div id="kunde"><a class="button" href="#">'
                . $_SESSION['vorname']
                . '</a><a class="button" href="#">logout</a><a class="button" href="#">Warenkorp</a></div>';
    } else {
        $kunde = '<div id="kunde"><a class="button" href="login.php">login</a><a class="button" href="regestrierung.php">regestrierung</a></div>';
    }
    
    return $kunde;
}

function filtrator($filter) {
    $filtrator="";
    $filtrator.=filtrator_child($filtrator,$filter,'produkt_name');
    $filtrator.=filtrator_child($filtrator,$filter,'produkt_volumen');
    $filtrator.=filtrator_child($filtrator,$filter,'name_weintyp');
    $filtrator.=filtrator_child($filtrator,$filter,'name_weingut');
    $filtrator.=filtrator_child($filtrator,$filter,'land_name');
    $filtrator.=filtrator_child($filtrator,$filter,'name_region');
    $filtrator.=filtrator_child($filtrator,$filter,'name_kontinent');
    return $filtrator;
}

//feld kann sein produkt_name,produkt_volumen,name_weintyp,name_weingut,land_name,name_region,name_kontinent
function filtrator_child($filtrator,$filter,$feld) {
    $filtrator_child='';
    if((strlen($filtrator)>0) && (strlen($filter[$feld])>0)) {
        $filtrator_child.=" AND ";
    }
    if ((isset($filter[$feld])) && (strlen($filter[$feld])>0)) {
        $filtrator_child.=$feld.' LIKE ';
        $filtrator_child.='"%'.$filter[$feld].'%"';
        }
    return $filtrator_child;
}
 //

function filter_div($input_filter) {
    $filter_form='<div class="pro">';
    $filter_form.='<form action="./liste.php" method="GET">';
    $filter_form.=' Name '.generate_html_form_datalist('produkt_name');
    $filter_form.=' Typ '.generate_html_form_datalist('name_weintyp');
    $filter_form.=' Weingut '.generate_html_form_datalist('name_weingut');
    $filter_form.=' Volume '.generate_html_form_datalist('produkt_volumen');
    $filter_form.=' Land '.generate_html_form_datalist('land_name');
    $filter_form.=' Region '.generate_html_form_datalist('name_region');
    $filter_form.=' Kontinent '.generate_html_form_datalist('name_kontinent');
    $filter_form.='<input type="submit" value="filter">';
    $filter_form.='</form></div>';
    return $filter_form;
}

//$feld kann sein produkt_name,produkt_volumen,name_weintyp,name_weingut,land_name,name_region,name_kontinent
function generate_html_form_datalist($feld) {
    $con = con_db();
    $select='<input list="'.$feld.'" name="'.$feld.'"><datalist id="'.$feld.'">';
    $sql = 'SELECT DISTINCT '.$feld.' '
            . 'FROM produkt p JOIN weintyp w ON p.weintyp_id=w.id_weintyp JOIN weingut wg ON '
            . 'p.weingut_id=wg.id_weingut JOIN laender l ON wg.land_id=l.id_land JOIN region r ON'
            . ' wg.region_id=r.id_region JOIN kontinent k ON l.kontinent_id=k.id_kontinent ORDER BY '.$feld.' ASC';
    $res = mysqli_query($con, $sql);
    while ($zeil = mysqli_fetch_assoc($res)) {
        $select.='<option value="'.$zeil["$feld"].'">';
    }
    $select.='</datalist>';
return $select; 
}

//$feld kann sein produkt_name,produkt_volumen,name_weintyp,name_weingut,land_name,name_region,name_kontinent
function generate_html_form_select($feld) {
    $con = con_db();
    $select='<select>';
    $sql = 'SELECT DISTINCT '.$feld.' '
            . 'FROM produkt p JOIN weintyp w ON p.weintyp_id=w.id_weintyp JOIN weingut wg ON '
            . 'p.weingut_id=wg.id_weingut JOIN laender l ON wg.land_id=l.id_land JOIN region r ON'
            . ' wg.region_id=r.id_region JOIN kontinent k ON l.kontinent_id=k.id_kontinent ORDER BY '.$feld.' ASC';
    $res = mysqli_query($con, $sql);
    while ($zeil = mysqli_fetch_assoc($res)) {
        $select.='<option value="'.$zeil["$feld"].'">'.$zeil["$feld"].'</option>';
    }
    $select.='</select>';
return $select; 
}

function list_output($input_filter) {
    $con = con_db();
    $list="";
    $filter="";
    var_dump($input_filter);
    if(array_filter($input_filter)) {
            $filter.= " WHERE ";
            $filter.=filtrator($input_filter);
    }
    //ich hole inhalt fur filter div kontainer
    
    $list.=filter_div($input_filter);
    
    $sql = 'SELECT produkt_nummer,produkt_name,produkt_beschr,produkt_preis FROM produkt p JOIN '
            . 'weintyp w ON p.weintyp_id=w.id_weintyp JOIN weingut wg ON '
            . 'p.weingut_id=wg.id_weingut JOIN laender l ON wg.land_id=l.id_land JOIN region r ON'
            . ' wg.region_id=r.id_region JOIN kontinent k ON l.kontinent_id=k.id_kontinent'.$filter;
    echo $sql;
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

function warenkorb_id($id_benutzer) {
    if(!isset($_SESSION['warenkorb'])) {
       $con = con_db();
       $sql = 'SELECT id_warenkorb FROM warenkorb WHERE benutzer_id='.$id_benutzer.' AND ISNULL(rechung_id)';
       $res = mysqli_query($con, $sql);
       if (!mysqli_affected_rows($con)==0) {
       $warenkorb = mysqli_fetch_assoc($res); 
       $act_warenkorb=$warenkorb['id_warenkorb'];
       }
       else {
       $act_warenkorb=warenkorb_new($id_benutzer);
       }      
    }     
 return $act_warenkorb;
}

//warenkorb_new tomas

function warenkorb_new($id_benutzer) {
    $con = con_db();
    $sql = 'INSERT INTO warenkorb(benutzer_id) VALUES ('.$id_benutzer.')';
    mysqli_query($con, $sql);
    $id_warenkorb=mysqli_insert_id($con);
    return $id_warenkorb;
}

//email senden mit id_benutzer                              //TODO email server konfigurieren

function email2benutzer($id_benutzer,$action) {
    $empfaenger= holab($id_benutzer,'email');
    
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

    echo mail($empfaenger,$betreff,$text,$header);  //zu email testen schrein echo vor der funktion mail
                                                    // bei dem output 1 war email geschickt
}

//holt benutzer daten aus datenbank ab (kann auch kennwort abholen) $was kann zb. vorname, nachname, anrede... sein.
function holab($id_benutzer,$was) {
    $con = con_db();
    $sql = 'SELECT '.$was.' FROM benutzer JOIN zugang ON benutzer.zugang_id=zugang.id_zugang WHERE (id_benutzer='.$id_benutzer.')';
    $res=mysqli_query($con, $sql);
    $das=mysqli_fetch_assoc($res);
    return $das["$was"];
}

//funktion fur aktivieren benutzer konto, return 1 wenn konto aktiviert war
function konto_aktivation($id_benutzer) {
    $con = con_db();
    $sql = 'UPDATE benutzer SET email_aktiv=1 WHERE email_aktiv=0 AND id_benutzer = '.$id_benutzer.';';
    mysqli_query($con, $sql);
    if (mysqli_affected_rows($con)==1) {
        uncon_db($con);
        return 1;                                           //TODO einstellen log
    }
    else {
        uncon_db($con);
        return 0;                                           //TODO einstellen log
    }
}
//generiert salz und macht sichers hash fur kennwort
function cryptKennwort($input,$runden = 9) {                                //TODO salz in datenbank speichern fur login_check
    $salz = "";
    $salzCharset= array_merge(range('A', 'Z'),range('a','z'),range(0,9));
    for($i=0;$i<22;$i++) {
        $salz.= $salzCharset[array_rand($salzCharset)];
    }
    return crypt($input, sprintf('$2y$%02d$',$runden) . $salz);
}

function search_feld() {
 $code='
    <form action="liste.php" method="get">        
    <input placeholder="Was mochtest du suchen..." type="search" value="" name="produkt_name" id="search">
    <input type="submit" value="Suchen">  
    </form>';
    return $code;   
}
