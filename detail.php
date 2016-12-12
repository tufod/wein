<?php
/*
 * Session Start +
*/
session_start();
require_once './biblio.inc.php';
$template='';
$title='Wein Details';
$kunde=login_check();
load_tpl('wein.tpl');
$template = str_replace('{kunde}', $kunde, $template);
$detail = display_detail();
$template = str_replace('{title}', $title, $template);
$template = str_replace('{container}',$detail,$template);
tpl_output();
?>


