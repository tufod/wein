<?php
session_start();
require_once './biblio.inc.php';
$template='';
$titel='Wein Liste';
load_tpl('wein.tpl');
$template = str_replace('{title}', $titel, $template);
$list=list_output('produkt');
$template = str_replace('{continer}', $list, $template);
tpl_output();

?>

