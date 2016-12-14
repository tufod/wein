<?php
 /*
  * Session Start + ( Damit die Seite in die Laufende Session eingebunden ist )
  */
session_start();

/*
 *  zusatzliche datei die benotigt wird zum ausfuhren der Seite
 */
require_once './biblio.inc.php';
require_once './filter.inc.php';


$template='';

$kunde=login_check();

/*
 *  Titel der Seite
 */
$title='Wein Liste';

$search= search_feld();
/*
 *  Style CSS Angabe f�r die Listen Seite 
 */
$style='<link rel="stylesheet" href="./styles/wein_liste.css" media="screen">';

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
 *  CSS f�r die Listen Seite �bergabe an wein Tamplate {style} 
 */
$template = str_replace('{style}', $style, $template);

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