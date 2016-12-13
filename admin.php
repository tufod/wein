
<?php
session_start();

require_once './biblio.inc.php';

$template='';

$kunde=login_check();
$title='Verwaltung';
$style='<link rel="stylesheet" href="./styles/listen_detail.css" media="screen">';

load_tpl('wein.tpl');
/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $title, $template);
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
    while ($d_bild = mysqli_fetch_assoc($res)) {
        $admin .= '<div class="detail">';
        
        $admin .= '<a href="images/weinbilder/gross/w'
                . $d_bild['produkt_nummer']
                . '.jpg" rel="lightbox" title="'.$d_bild['produkt_name'].'" onerror="this.src=\'images/weinbilder/gross/blank.jpg\'">'
                . '<img class="detail_bild" src="images/weinbilder/mittel/w'.$d_bild['produkt_nummer'].'.jpg" '
                . 'onerror="this.src=\'images/weinbilder/mittel/blank.jpg\'"></a>';
        $admin .= '<h2 class="detail_name">' . $d_bild['produkt_name'] . '</h2>'
                . '<img class="d_flag" src="images/flags/4x3/' . $d_bild['land_id'] . '.svg"'
                . 'title="' . $d_bild['land_name'] . '">';
        $admin .= '<div class="kategorie"><h4>Weintyp</h4>: ' . $d_bild['name_weintyp'] . ''
                . ', <h4> Region: </h4>' . $d_bild['name_region'] . ', <h4> Weingut: </h4>' . $d_bild['name_weingut'] . '</div>';
        $admin .= '<br><div class="detail_text">' . $d_bild['produkt_text'] . '<br>'
                . $d_bild['produkt_volumen'] . ' Liter</div>';
        $admin .= '<div class="detail_waren"><br>';
        $admin .= $d_bild['produkt_preis'] . ' €/stück';
        if(isset($_SESSION['id_benutzer'])) {
               if ($_SESSION['id_benutzer'] == '1'){
            $admin .= '';
            $admin .= ' <a href="admin.php"><input type="button" class="warenkorp" value="bearbeiten"></a>';
            $admin .= ' <input type="button" class="warenkorp" value="zurück" onClick="history.back()">';
        }
        }
        else 
            header('Location: index.php');
        

        $admin .= '</div>';
        $admin .= '</div>';
    }

    return $admin;
}

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);

$admin = display_admin();

$template = str_replace('{container}',$admin,$template);

tpl_output();

?>

