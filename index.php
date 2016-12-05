<?php
session_start();
require_once './biblio.inc.php';
$template='';
$titel='leste_seit';
load_tpl('wein.tpl');
$template = str_replace('{title}', $titel, $template);
$list=list_output('produkt');
$template = str_replace('{continer}', $list, $template);
 echo '<script type="text/javascript" src="javascript_biblio.js"></script>';
tpl_output();

?>

