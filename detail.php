<?php
/*
 * Session Start 
*/
session_start();

/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
require_once './biblio.inc.php';
$template='';

/*
 *  Ausgabe des Titels der Seite
 */
$title='Wein Details';
/*
 *  Style CSS Angabe für die History Seite 
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

$detail = display_detail();

/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = 
 */
$template = str_replace('{container}',$detail,$template);

/*
 * Seiten Ausgabe
 */
tpl_output();
?>


