
<?php
session_start();

require_once './biblio.inc.php';

$template='';

$kunde=login_check();
$title='Verwaltung';

load_tpl('wein.tpl');
/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $title, $template);

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);

tpl_output();

?>

