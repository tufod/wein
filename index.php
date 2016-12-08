<?php

/*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
session_start();

/*
 *  zus�tzliche datei die ben�tigt wird zum ausf�hren der Seite
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


$liste_container=list_output('produkt');

/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $list
 */
$template = str_replace('{container}', $liste_container, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();

?>

