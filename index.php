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
$titel='Wein Liste';

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');

/*
 *  Ausgabe des Titels der Seite
 */
$template = str_replace('{title}', $titel, $template);

/*
 *   Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);


$list=list_output('produkt');

/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $list
 */
$template = str_replace('{container}', $list, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();

?>

