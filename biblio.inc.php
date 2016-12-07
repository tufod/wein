<?php

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

function login_check() {
    if (isset($_SESSION['benutzer'])) {
        $kunde='<a class="button" href="#">'
                .'benutzer'
                .'</a><a class="button" href="#">logout</a><a class="button" href="#">Warenkorp</a>';
    } else {
        $kunde='<a class="button" href="#">login/regis</a>';
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
function diplay_detail() {
    $id = $_GET['id'];
    $con = con_db();
    $sql = "SELECT produkt_name,produkt_text,produkt_preis FROM produkt'
            . 'WHERE produkt_nummer = '.$id.';";
    $res = mysqli_query($con, $sql);
    while ($d_bild = mysqli_fetch_assoc($res));
        echo '<img src="images/weinbilder/mittel/w',$d_bild['produkt_nummer']
                .'.jpg" onerror="this.src=\'images/weinbilder/mittel/blank.jpg\' ">';
        
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
