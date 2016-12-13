<!DOCTYPE html>
<html>
<head>
<title>{title}</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./styles/styles.css" media="screen">
<link rel="stylesheet" href="./styles/listen_detail.css" media="screen">
<link rel="stylesheet" href="./styles/kunden_kontakt.css" media="screen">
<link rel="stylesheet" href="./styles/kunden_konto.css" media="screen">
<link rel="stylesheet" href="./styles/kunden_login.css" media="screen">
<link rel="stylesheet" href="./styles/kunden_registry" media="screen">

<script type="text/javascript" src="javascript_biblio.js"></script>
<script src="http://stellatest.de/js/prototype.js" type="text/javascript"></script>
<script src="http://stellatest.de/js/scriptaculous.js?load=effects,builder" type="text/javascript"></script>
<script src="http://stellatest.de/js/lightbox.js" type="text/javascript"></script>
{style}
</head>
<body>

{kunde}
    <div class="clearfix"></div>
<div id="wrapper">
   
    <div id="header">
        
        <img src="images/in_vino_veritas.png" alt="In Vino Veritas">
    </div>
    <div id="navi">
        <ul>
            <li><a href="index.php">Startseite</a></li>
            <li><a href="liste.php">Weine</a></li>
            <li><a href="history.php">Über uns</a></li>
            <li><a href="kontakt.php">Kontakt</a></li>
        </ul>
    </div>
    <div id="main">{container}</div>
    <div id="footer">
        <div id="copyright">InVinoVeritas.de Copyright © 2016 All Rights Reserved <a href="  impressum.php">impressum</a></div></div>
</div>
   
</body>
</html>
