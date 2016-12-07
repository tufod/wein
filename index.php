<?php
session_start();
require_once './biblio.inc.php';
$template='';
$kunde=login_check();
$titel='Wein Liste';
load_tpl('wein.tpl');
$template = str_replace('{title}', $titel, $template);
$template = str_replace('{kunde}', $kunde, $template);
$list=list_output('produkt');
$template = str_replace('{container}', $list, $template);

tpl_output();

?>

