<?php

//ini_set('session.use_trans_sid', 1);
session_start();
require_once './biblio.inc.php';
$benutzer = benutzer_Email_check($_POST['email']);
if ($benutzer['id_benutzer'] > 0) {
   $_SESSION['id_benutzer'] = 'brief';
    header('Location: regestrierung.php');
    exit;
} else {
    
    header('Location: liste.php');
    exit;
}
?>