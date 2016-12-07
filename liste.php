<?php
 /*
  * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
  */
session_start();

/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
require_once './biblio.inc.php';

$template='';
$kunde=login_check();

/*
 *  Titel der Seite
 */
$title='Wein Liste';

/*
 *   Load des Seiten Aufbau Templates (Wein Template)
 *   Seiten Backround Bild unf vorgaben
 */
load_tpl('wein.tpl');

/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $title, $template);

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);

/*
 *   Load  ... (produkt)
 *  
 */
$list=list_output('produkt'); 

/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $list, $template);
//echo ' ';

/*
 * Seiten Ausgabe
 */
tpl_output();
?>

