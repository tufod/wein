
<?php
if(isset($_GET['id'])) {
session_start();

require_once './biblio.inc.php';

function volumen() {
    $con = con_db();
    $sql = 'SELECT DISTINCT produkt_volumen FROM produkt';
    $res = mysqli_query($con, $sql);
    $option ="";
    while ($temp=mysqli_fetch_row($res)){
        $option.='<option>'.$temp[0].'</option>';
    }
    return $option;
}
function weintyp() {
    $con = con_db();
    $sql = 'SELECT DISTINCT name_weintyp FROM weintyp';
    $res = mysqli_query($con, $sql);
    $typ ="";
    while ($typen=  mysqli_fetch_assoc($res)){
        $typ.='<option>'.$typen['name_weintyp'].'</option>';
    }
    return $typ;
}

function display_admin() {
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
    $admin = '';
    while ($d_admin = mysqli_fetch_assoc($res)) {
        $admin .= '<div class="detail">';
        
        $admin .= '<a href="images/weinbilder/gross/w'
                . $d_admin['produkt_nummer']
                . '.jpg" rel="lightbox" title="'.$d_admin['produkt_name'].'" onerror="this.src=\'images/weinbilder/gross/blank.jpg\'">'
                . '<img class="detail_bild" src="images/weinbilder/mittel/w'.$d_admin['produkt_nummer'].'.jpg" '
                . 'onerror="this.src=\'images/weinbilder/mittel/blank.jpg\'"></a>';
        $admin .= '<input type="text" value="' . $d_admin['produkt_name'] .'">'
                . '<img class="d_flag" src="images/flags/4x3/' . $d_admin['land_id'] . '.svg"'
                . 'title="' . $d_admin['land_name'] . '">';
        $admin .= '<div class="kategorie"><h4>Weintyp:</h4><select name="typ">'
                .$typ= weintyp().'</select><h4> Weingut: </h4><input type="text" value="'
                . $d_admin['name_weingut'] . '"></div>';
        $admin .= '<br><div class="detail_text"><textarea name="text" cols="95" rows="8" placeholder="'. $d_admin['produkt_text'] . '"></textarea><br><select name="liter">'
                .$option= volumen().'</select> Liter</div>';
        $admin .= '<div class="detail_waren"><br>';
        $admin .= '<input type="text" value="' . $d_admin['produkt_preis'] .'" size="6"> €/stück';
        if(isset($_SESSION['id_benutzer'])) {
               if ($_SESSION['id_benutzer'] == '1'){
            $admin .= '';
            $admin .= ' <a href="save.php=?id'.$d_admin['produkt_nummer'].'"><input type="button" class="warenkorp" value="speichern"></a>';
            $admin .= ' <input type="button" class="warenkorp" value="zurück" onClick="history.back()">';
              }
        }
        $admin .= '</div>';
        $admin .= '</div>';
    }

    return $admin;
}
}
else 
            header('Location: index.php');

$template='';



/*
 *  Ausgabe des Titels der Seite
 */
$title='Verwaltung';
/*
 *  Style CSS Angabe für die Verwaltungs Seite 
 */
$style='<link rel="stylesheet" href="./styles/listen_detail.css" media="screen">';

$kunde=login_check();

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');

/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $title, $template);

/*
 *  CSS für die History übergabe an wein Tamplate {style} 
 */
$template = str_replace('{style}', $style, $template);

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);

$admin = display_admin();

/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $admin
 */
$template = str_replace('{container}',$admin,$template);

/*
 * Seiten Ausgabe
 */
tpl_output();

?>

