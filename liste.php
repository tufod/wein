<?php
 /*
  * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
  */
session_start();

/*
 *  zusatzliche datei die benotigt wird zum ausfuhren der Seite
 */
require_once './biblio.inc.php';

$template='';

$kunde=login_check();

/*
 *  Titel der Seite
 */
$title='Wein Liste';

$search= search_feld();

/*
 *   Load des Seiten Aufbau Templates (Wein Template)
 *   Seiten Backround Bild unf vorgaben
 */  
load_tpl('wein.tpl');

$template = str_replace('{search}',$search, $template);
/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $title, $template);

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);

/*
 *   Load produktlist mit filter 
 */
$list=list_output($_GET); 

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