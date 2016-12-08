<?php
session_start();
/*
 *  zus�tzliche datei die ben�tigt wird zum ausf�hren der Seite
 */
require_once './biblio.inc.php';
/*
 *   Load des Seiten Aufbau Templates (Wein Template)
 *   Seiten Backround Bild unf vorgaben
 */

load_tpl('wein.tpl');

/*
 *  Titel der Seite
 */
$title='Wein Liste';
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

