<?php
session_start();
require_once './biblio.inc.php';
require_once './warenkorb.inc.php';

$_SESSION['id_benutzer']=1;
$template='';
//$kunde=login_check();
$title='Warebnkorb';
load_tpl('wein.tpl');
$template = str_replace('{title}', $title, $template);
//$template = str_replace('{kunde}', $kunde, $template);
$list=get_warenkorb();
$template = str_replace('{container}', $list, $template);
tpl_output();
?>

