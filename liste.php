<?php
 /*
  * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
  */
session_start();

/*
 *  zusatzliche datei die benotigt wird zum ausfuhren der Seite
 */
require_once './biblio.inc.php';


/*
 *   Load des Seiten Aufbau Templates (Wein Template)
 *   Seiten Backround Bild unf vorgaben
 */

load_tpl('wein.tpl');


$template = str_replace('{search}',$search, $template);

/*
 *  Titel der Seite
 */
$title='Wein Liste';
$search= search_feld();

/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $title, $template);
$kunde_Info=login_check();
/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde_Info, $template);
/*
 *   Load  ... (produkt)
 *  
 */
$liste_container=list_output('produkt'); 
if(isset($_GET['filter'])) {
    $list.='';
    
    
}
$list=list_output($_GET); 
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $liste_container, $template);
//echo ' ';
/*
 * Seiten Ausgabe
 */
tpl_output();
?>

