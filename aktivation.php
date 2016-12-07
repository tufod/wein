<?php
require_once './biblio.inc.php';

if((isset($_GET['s1'])) && (isset($_GET['b']))) {
   $s1=$_GET['s1'];
   $s2= hash_generator(($_GET['b']));
    echo 'hallo';
}

if(isset($benutzer)) {
$email = holab($benutzer,'email');
$sha1 = hash_generator($benutzer);

$absender="aktivation@invinoveritas.de";
$betreff="Anmeldung In Vino Veritas";
$text = '<html>
<head>
    <title>Email bestätigung</title>
</head>
<body>
<p>Sehr geehrter ';
$text.=holab($benutzer,'anrede');
$text.=' ';
$text.=holab($benutzer,'nachname');
$text.=',</p> vielen Dank für die Beantragung Ihres Kundenkontos.<br>
Um Ihre Registrierung vollständig abschließen zu können, folgen Sie bitte diesem Link:<br>';
$text.='http://';
$text.=$_SERVER;
$text.='/wein/aktivation.php?s1='.$sha1.'&b='.$benutzer;
$text.='<br>Erst durch Anklicken dieses Links wird Ihr Kundenkonto freigeschaltet.
Bitte beachten Sie, dass die Verknüpfung von Kundenkonto und Kundennummer bis zu zwei Werktage dauern kann. Bis dahin, kann der Zugriff auf manche Online-Serviceleistungen (wie die Einsicht des Bestellstatus) eingeschränkt sein. Gerne können Sie schon jetzt Dienste wie "Fragen und Antworten" und "Produktbewertungen" nutzen.
Bitte speichern Sie diese Nachricht als zukünftige Referenz. 

<h1>HTML-E-Mail mit PHP erstellen</h1>
</body>
</html>
';
}
