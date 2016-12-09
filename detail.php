<?php
/*
 * Session Start 
*/
session_start();
require_once './biblio.inc.php';
$template='';
$title='Wein Details';
load_tpl('wein.tpl');
$detail = display_detail();

$template = str_replace('{title}', $title, $template);
$template = str_replace('{container}',$detail,$template);
tpl_output();
?>


