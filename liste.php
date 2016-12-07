<?php
session_start();
require_once './biblio.inc.php';
$template='';
$title='Wein Liste';
load_tpl('wein.tpl');
$template = str_replace('{title}', $title, $template);
$list=list_output('produkt');
$template = str_replace('{container}', $list, $template);
//echo ' ';
tpl_output();
?>

