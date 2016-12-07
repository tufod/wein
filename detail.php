<?php
session_start();
require_once './biblio.inc.php';
$template='';
$title='Wein Details';
load_tpl('wein.tpl');
$template = str_replace('{title}', $title, $template);
tpl_output();
$template = diplay_detail('{container}');
?>

