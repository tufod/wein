<?php
/*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
  session_start();

/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
 require_once './biblio.inc.php';
 
/*
 *  Link zuweisung CSS
 */
 
 
 
$template='';
$kunde=login_check();

/*
 *  Ausgabe des Titels der Seite
 */
$titel='Start Seite';

/*
 *  Style CSS Angabe für die Index Seite 
 */
$style='<link rel="stylesheet" href="./styles/index.css"> media="screen">';

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');

/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $titel, $template);


/*
 *  CSS für die History übergabe an wein Tamplate {style} 
 */
$template = str_replace('{style}', $style, $template);

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);


/*
 *  $erge = Seiten inhalte
 *  inhalt der Seite History 
 */
$erge='<div id="history_main">
        <h1>SIn Vino Veritas Ratskeller</h1>
        <form action="kontakt.php" method="post">
               <table id="history_main_table">
               <tr>
               <td>
                <p><a name="Historieoben"></a>
                <h2>Wir begrüßen Sie herzlich im Bremer In Vino Veritas Ratskeller</h2>
                <br />
               <p>
               <span>
               <img style="margin-right: 15px; float: left;" alt="Vino Veritas rathaus marktplatz bremen" src="./images/stories/bilder/rathaus_marktplatz_bremen.jpg" height="281" width="400" />
               </span>
               <span>Seit mehr als 600 Jahren verbindet sich mit dem</span>
               <br />
               <span> Bremer Ratskeller eine Handelstradition, die einen</span>
               <br />
               <span> bedeutenden Beitrag zur Weinkultur in Deutschland</span>
               <br />
               <span>geleistet hat. Dieser Tradition, die für eine hohe</span>
               <br />
               <span> Sensibilität im Umgang mit dem ältesten Kulturgetränk </span>
               <br />
               <span> der Welt steht, fühlen wir uns verpflichtet.</span>
               <br /><br />
               <span> Freuen Sie sich auf Erlebnisse mit außergewöhnlichen</span>
               <br /><span> Weinen, die wir für Sie sorgsam und nach strengen</span>
               <br /><span> Qualitätskriterien ausgewählt haben. Lassen Sie sich </span>
               <br /><span> von uns durch die deutsche Weinlandschaft, zu Weinen</span>
               <br /><span> und Winzern führen. Nutzen Sie unser Informations-</span>
               <br /><span> und Beratungsangebot, mit dem wir Sie bei ihrer </span>
               <br /><span> persönlichen Weinauswahl unterstützen möchten.</span></p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <table id="history_main_table_sprungzeile">
                <tbody>
                <tr>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 1" href="#angebot1" target="_self">Angebot 1</a></h3>
                    </td>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 2" href="#angebot2" target="_self">Angebot 2</a></h3>
                    </td>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 3" href="#angebot3" target="_self">Angebot 3</a></h3>
                    </td>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 4" href="#angebot4" target="_self">Angebot 4</a></h3>
                    </td>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 5" href="#angebot5" target="_self">Angebot 5</a></h3>
                    </td>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 6" href="#angebot6" target="_self">Angebot 6</a></h3>
                    </td>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 7" href="#angebot7" target="_self">Angebot 7</a></h3>
                    </td>
                    <td>
                        <h3><a id="history_zeile" title="Angebot 8" href="#angebot8" target="_self">Angebot 8</a></h3>
                    </td>
                    </tr>
                </tbody>
                </table>
                <p id="history">&nbsp;</p>
                
                <hr />
                <p>&nbsp;</p>
                        <h3><a name="angebot1"></a>Angebot 1</h3>
                <p id="history">
                    Angebot Hier
                    
                    <br />
                    <br />
                    <a title="Seitenanfang" href="#Historieoben"><span><br /><br />zum Seitenanfang</span></a>
                <p>&nbsp;</p>    
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="angebot2"></a>Angebot 2</h3>
                <p id="history">
                    Angebot Hier
                  
                    <br />
                    <br />
                    <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                <p>&nbsp;</p>    
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="angebot3"></a>Angebot 3</h3>
                <p id="history">
                    Angebot Hier
                   
                    <br />
                    <br />
                    <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                <p>&nbsp;</p>    
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="angebot4"></a>Angebot 4</h3>
                <p id="history">
                     Angebot Hier    
                     
                    <br />
                    <br />
                    <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                <p>&nbsp;</p>    
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="angebot5"></a>Angebot 5</h3>
                <p id="history">
                    Angebot Hier
                                        
                    <br />
                    <br />
                    <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                <p>&nbsp;</p>   
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="angebot6"></a>Angebot 6</h3>
                
                <p id="history">
                    Angebot Hier
                   
                   <br />
                   <br />
                   <a title="Historie" href="#Historieoben" target="_self"><span><br />zum Seitenanfang</span></a>
                </p>
                <p>&nbsp;</p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="angebot7"></a>Angebot 7</h3>
                
                <p id="history">
                    Angebot Hier
                  
                    <br />
                    <br />
                    <a title="Historie" href="#Historieoben" target="_self"><span><br />zum Seitenanfang</span></a>
                </p>
                <p>&nbsp;</p>
                <hr />
                <p>
                    <br /> <a name="angebot8"></a>
                </p>
                <h3>Angebot 8</h3>
                <p id="history">
                    
                    Angebot Hier
                    
                    <br />
                    <br />
                       <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                 <p>&nbsp;</p>
                <hr />
               </td>
               </tr>
                                    
               </table>
        </form>
       </div>';     
       
/*
 *   Load des Seiten Inhaltes (container)
 *   Seiten inhalt = $erge
 */
$template = str_replace('{container}', $erge, $template);

/*
 * Seiten Ausgabe
 */
tpl_output();
?>