   <?php 
session_start();
/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite +
 */
require_once './biblio.inc.php';
/*
 *   Load des Seiten Aufbau Templates (Wein Template)
 *   Seiten Backround Bild unf vorgaben
 */
load_tpl('wein.tpl');
/*
 *  Titel der Seite
 */
$titel='Impressum';
/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $titel, $template);
$kunde_Info=login_check();
/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde_Info, $template);
/* 
 * Impressum
 * Überschrift
 * Text Inhalt
 * Impressums Text Inhalt
 * 
 */
$impressum_container='<div id="main">
        <h2>Impressum</h2>
        <main>
            <section>
            <p>Angaben gemäß § 5 TMG</p><p>Max Muster <br> Musterweg<br> 12345 Musterstadt <br></p>
            <p> <strong> Vertreten durch: </strong> <br> Max Muster <br> </p>
            <p> <strong> Kontakt:</strong> <br> Telefon: 01234-789456 <br> Fax: 1234-56789<br>E-Mail: <br></p>
            <p> <strong> Umsatzsteuer-ID: </strong> <br> Umsatzsteuer-Identifikationsnummer gemäß §27a Umsatzsteuergesetz: Musterustid.<br><br>
                <strong>Wirtschafts-ID: </strong> <br> Musterwirtschaftsid <br> </p>
            <p> <strong> Aufsichtsbehörde: </strong> <br> Musteraufsicht Musterstadt <br> </p>
            <p> <strong> Verantwortlich für den Inhalt nach § 55 Abs. 2 RStV: </strong> <br> Max Muster <br> Musterweg <br> 12345 Musterstadt <br> </p>
            <p> <strong> Google Analytics: </strong> 
            Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. ("Google").
            Google Analytics verwendet sog. "Cookies", Textdateien, 
            die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglicht. 
            Die durch den Cookie erzeugten Informationen über Ihre Benutzung diese Website (einschließlich Ihrer IP-Adresse)
            wird an einen Server von Google in den USA übertragen und dort gespeichert.
            Google wird diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, 
            um Reports über die Websiteaktivitäten für die Websitebetreiber zusammenzustellen
            und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen zu erbringen. 
            Auch wird Google diese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich vorgeschrieben
            oder soweit Dritte diese Daten im Auftrag von Google verarbeiten.
            Google wird in keinem Fall Ihre IP-Adresse mit anderen Daten der Google in Verbindung bringen. 
            Sie können die Installation der Cookies durch eine entsprechende Einstellung Ihrer Browser Software verhindern; 
            wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website voll umfänglich nutzen können.
            Durch die Nutzung dieser Website erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch Google
            in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck einverstanden. 
            <br> <br>
            <strong>Google AdSense: </strong>
            Diese Website benutzt Google Adsense,
            einen Webanzeigendienst der Google Inc., USA ("Google"). Google Adsense verwendet sog. "Cookies" (Textdateien), 
            die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglicht.
            Google Adsense verwendet auch sog. "Web Beacons" (kleine unsichtbare Grafiken) zur Sammlung von Informationen.
            Durch die Verwendung des Web Beacons können einfache Aktionen wie der Besucherverkehr auf der Webseite aufgezeichnet und gesammelt werden.
            Die durch den Cookie und/oder Web Beacon erzeugten Informationen über Ihre Benutzung diese Website (einschließlich Ihrer IP-Adresse)
            werden an einen Server von Google in den USA übertragen und dort gespeichert.
            Google wird diese Informationen benutzen, um Ihre Nutzung der Website im Hinblick auf die Anzeigen auszuwerten,
            um Reports über die Websiteaktivitäten und Anzeigen für die Websitebetreiber zusammenzustellen
            und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen zu erbringen.
            Auch wird Google diese Informationen gegebenenfalls an Dritte übertragen, 
            sofern dies gesetzlich vorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten.
            Google wird in keinem Fall Ihre IP-Adresse mit anderen Daten der Google in Verbindung bringen. 
            Das Speichern von Cookies auf Ihrer Festplatte und die Anzeige von Web Beacons können Sie verhindern,
            indem Sie in Ihren Browser-Einstellungen " keine Cookies akzeptieren "
            wählen (Im MS Internet-Explorer unter " Extras > Internetoptionen > Datenschutz > Einstellung ";
            im Firefox unter " Extras > Einstellungen > Datenschutz > Cookies "); wir weisen Sie jedoch darauf hin, 
            dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website voll umfänglich nutzen können.
            Durch die Nutzung dieser Website erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch Google
            in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck einverstanden.</p>

            <p><a href="http://www.disclaimer.de/disclaimer.htm?farbe=000000/d7e3ae/000000/000000" target="_blank">Haftungsausschluss</a></p> 
            </section>
        </main>
    </div>';
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}',$impressum_container, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();

?>
