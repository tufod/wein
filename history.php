<!-- <link rel="stylesheet" href="pixsearch_default.css"> -->
<?php
 /*
 * Session Start ( Damit die Seite in die Laufende Session eingebunden ist )
 */
  session_start();

/*
 *  zusätzliche datei die benötigt wird zum ausführen der Seite
 */
 

 require_once './list.inc.php';

$template='';
$kunde=login_check();

/*
 *  Ausgabe des Titels der Seite
 */
$titel='Kontakt Seite';

/*
 *  Load des Wein Template 
 */
load_tpl('wein.tpl');

/*
 *   Titel Anzeige der Seite
 */
$template = str_replace('{title}', $titel, $template);

/*
 * Anzeige Kunde rechts oben auf der Seite
 */
$template = str_replace('{kunde}', $kunde, $template);



/*
 *  $erge = Seiten inhalte
 *  Anrede
 *  Nachname
 *  Vorname
 *  Telefon für rückfragen
 *  e-Mail adresse
 *  Textfeld für eingaben vom Kunden
 * 
 */
$erge='<div id="history_main">
        <h1>Historie</h1>
        <form action="kontakt.php" method="post">
               <table id="history_table1">
               <tr>
               <td>
                <p>&nbsp;</p>
                <p><a name="Historieoben"></a>Handel und Seefahrt haben die Hansestadt Bremen entscheidend geprägt: 
                Es waren Bremer Kaufleute,
                die hier im Schnittpunkt der wichtigsten Handelsstraßen vom Rhein zur Ostsee und von der Weser zur Nordsee die Geschicke dieser Stadt bestimmt haben.
                In diesem Zusammenhang steht der Aufstieg Bremens zu einer, wenn auch heimlichen, Wein- Metropole in Deutschland.
                Die einzigartige Bedeutung des VinoVeritas  Ratskellers ist ohne seine wechselhafte Geschichte,
                die sich bis in das 14. Jahrhundert zurückverfolgen lässt, nicht zu verstehen. Sein Name hat oft gewechselt,
                vom „Weinkeller" zum „Stadtweinkeller" und „Ratsweinkeller" bis hin zum „VinoVeritas Ratskeller"
                sein Ruhm, eines der ehrwürdigsten und besten deutschen Weinhandelshäuser zu sein,
                ist in den Jahrzehnten seines Bestehens ständig gewachsen.
                Mit den hier nachfolgenden historischen Schlaglichtern laden wir Sie zu einem Streifzug durch 600 Jahre Weinkultur an der Weser ein.</p>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <table id="history_table1">
                <tbody>
                <tr>
                    <td>
                        <h3><a id="history" title="14. Jahrhundert" href="#vierzehnjhd" target="_self">14. Jhdt.</a></h3>
                    </td>
                    <td>
                        <h3><a id="history" title="15. Jahrhundert" href="#fuenfzehnjhd" target="_self">15. Jhdt.</a></h3>
                    </td>
                    <td>
                        <h3><a id="history" title="16. Jahrhundert" href="#sechszehnjhd" target="_self">16. Jhdt.</a></h3>
                    </td>
                    <td>
                        <h3><a id="history" title="17. Jahrhundert" href="#siebzehnjhd" target="_self">17. Jhdt.</a></h3>
                    </td>
                    <td>
                        <h3><a id="history" title="18. Jahrhundert" href="#achtzehnjhd" target="_self">18. Jhdt.</a></h3>
                    </td>
                    <td>
                        <h3><a id="history" title="19. Jahrhundert" href="#neunzehnjhd" target="_self">19. Jhdt.</a></h3>
                    </td>
                    <td>
                        <h3><a id="history" title="20. Jahrhundert" href="#zwanzigjhd" target="_self">20. Jhdt.</a></h3>
                    </td>
                    <td>
                        <h3><a id="history" title="21. Jahrhundert" href="#einundzwanzigjhd" target="_self">21. Jhdt.</a></h3>
                    </td>
                    </tr>
                </tbody>
                </table>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
                <p id="history">&nbsp;</p>
                <p>&nbsp;</p>
                <hr />
                <p>&nbsp;</p>
                        <h3><a name="vierzehnjhd"></a>14. Jahrhundert</h3>
                <p><br />
                    <span>
                        <img id="history_bild_01" title="14. Jahrhundert Bremer VinoVeritas  Ratskeller" src="./images/stories/geschichte-1.jpg" alt="14. Jahrhundert Bremer Ratskeller"/>
                    </span>
                </p>
                <p id="history">
                    <span>Einen städtischen Weinkeller hat es schon im mittelalterlichen Bremen als Vorläufer des&nbsp; VinoVeritas Ratskellers gegeben. 
                            Da der Rat schon vor 1330 das Privileg zum Kleinausschank von Weißwein besaß,
                            bedurfte es schließlich auch entsprechender Räume, in denen er diesen anbieten konnte. 
                            Auf das Jahr 1342 lässt sich denn auch die erste urkundliche Erwähnung eines „Stadtweinkellers“ in Bremen datieren. 
                            Bereits 1350 gab es die erste bremische Weinverordnung. Im Ratskeller werden nur deutsche Weine angeboten. 
                            Diese Tradition beruht auf dem im Mittelalter vom Bremer Rat übernommenen ertragreichen Weinmonopol,
                            das bis 1815 immer wieder erneuert wurde.
                            Aufgrund des Rheinweinmonopols und wegen der günstigen Verkehrswege für den Weinbezug führte der VinoVeritas Ratskeller im wesentlichen Rhein und Moselweine.
                            <strong>
                                    <br/><br/>
                            </strong>
                    </span>
                </p>
                <p>&nbsp;</p>
                <p id="history">
                    <span>
                        <strong>
                            <br />
                            <br />
                        </strong>
                        <em>Das Bremer Rathaus um 1930 mit Blick auf den Eingang des VinoVeritas Ratskellers; im Hintergrund erhebt sich der St. Petri-Dom.
                        </em>
                    </span>
                    <br />
                    <br />
                    <a title="Seitenanfang" href="#Historieoben">
                        <span>
                            <span>zum Seitenanfang
                            </span>                               
                        </span>
                    </a>
                </p>
                <p id="history">&nbsp;</p>
                <p id="history">
                    <span>
                        <strong title="zum Seitenanfang">&nbsp;</strong>
                    </span>
                </p>
                <p id="history">
                    <span>
                        <strong title="zum Seitenanfang">&nbsp;</strong>
                    </span>
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="fuenfzehnjhd"></a>15. Jahrhundert</h3>
                <p>&nbsp;</p>
                <p id="history">
                     <span>
                         Bei Auseinandersetzungen mit&nbsp; Erzbischof Albrecht II. im Jahr 1366 wurde bereits eine hölzerne Rolandstatue,
                         die den Anspruch auf Rechtsfreiheit symbolisierte, auf dem Bremer Marktplatz verbrannt.
                         1404 errichtet die Bürgerschaft an der selben Stelle nun einen feuerfesten Roland aus Stein: 
                         Das Symbol für bürgerliches Selbstbewusstsein und Autonomie steht auch heute noch neben dem Rathaus,
                         mit einem trotzigen Blick zum Dom.
                         – Solange der Roland vor dem Rathaus steht, sei die Freiheit Bremens nicht bedroht,
                         heißt es schon seit nunmehr sechs Jahrhunderten. 
                     </span>
                    <br /> <br />
                    <span>
                        <strong>
                            <img id="history_bild_02"" title="15. Jahrhunder Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-2.jpg" alt="15. Jahrhunder Bremer Ratskeller" />
                        </strong>
                        Mit dem Bau des Rathauses im Jahr 1405 wird auch der Stadtweinkeller in die neu entstandenen Kellerräume unter dem Rathaus verlegt,
                        „um die Bürger wohlfeil mit Wein zu versorgen.”
                    </span>
                    <br /> <br />
                    <span>
                        Im Bremer Ratskeller wird nur allgemein „Rheinischer Wein” angeboten.
                        Es gibt hier lediglich zwei Sorten, einen „gemeinen” und einen „besseren”,
                        die zu verschiedenen Preisen ausgeschenkt werden. Beliebt sind auch Mischgetränke wie der Claret („clareten wyn”),
                        ein Gewürzwein, der unter Zugabe von Honig, Zucker, Safran, Nelken, Muskat und anderen Zutaten hergestellt wurde.
                        Zur Abklärung ließ man das Getränk durch einen Leinensack laufen, woraus sich der Name Claret (geklärter Wein) ableitet.
                        Auch der bittere Alantwein, ein im Mittelalter ebenfalls bekannter Gewürzwein,
                        wurde noch bis in das 19. Jahrhundert hinein im Ratskeller getrunken.
                    </span>
                    <br /><br />
                    <br /><br />
                    <span>
                        <em>Die Statue des Roland: Das weltberühmte Wahrzeichen Bremens
                            auf dem Marktplatz der Hansestadt ist seit seiner Wiedererrichtung im Jahr 1405
                            ein Symbol für die Autonomie und Souveränität der Bremer Bürgerschaft.
                        </em>
                    </span>
                    <br />
                    <span>© Fotografie: text.werk</span>
                    <br /><br />
                    <span>
                        <a title="Historie" href="#Historieoben" target="_self"><span>zum Seitenanfang</span></a>
                    </span>
                </p>
                <p>
                    <br /><br />
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="sechszehnjhd"></a>16. Jahrhundert</h3>
                <p><br />
                    <span>
                        <img id="history_bild_03" title="16. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-3.jpg" alt="16. Jahrhundert Bremer Ratskeller"  />
                    </span>
                </p>
                <p id="history">
                    <span>
                        Einige Erweiterungsbauten verleihen dem VinoVeritas Ratskeller ein neues Gesicht:
                        Um 1550 entstehen nördlich der großen Halle der „Apostelkeller“ sowie das&nbsp; „Senatszimmer“.
                        Um 1600 wurden an der Südseite der historischen Halle kleinere hölzerne Verschläge abgetrennt, die heutigen „Priölken".
                        An ihrem Ostende wird ein Raum eingerichtet, in dem die ältesten und wertvollsten Weine des Kellers gelagert wurden.
                        Im Jahr 1599 wird dieser Keller erstmals als „Rose“ bezeichnet. Seit dem Mittelalter war es&nbsp; üblich,
                        Weine und Lagerräume nach Blumen zu benennen. Die höchstgeschätzten Weine benannte man gerne nach der schönsten Blume,
                        und als solche galt zu jener Zeit die Rose.
                    </span>
                    <br /> <br /> <br /><br />
                    <span>
                        <img id="history_bild_04" title="16. Jahrhundert VinoVeritas Ratskeller Bremen" src="./images/stories/geschichte-4.jpg" alt="16. Jahrhundert VinoVeritas Ratskeller Bremen" />
                    </span>
                    <br />
                    <span>Der Schütting,
                        das Gildehaus der bremischen Kaufmannschaft (heute Handelskammer der Stadt Bremen) wird 1537/38
                        an der Südseite des Marktplatzes im Stil der Renaissancebauten Flanderns errichtet.
                    </span>
                    <br /><br />
                    <br /><br />
                </p>
                <p id="history">
                    <span>
                        <em>Oberes Foto: Nicht nur barocke Heiterkeit: </em>
                    </span>
                    <br />
                    <span>
                        <em>Die Bacchus-Gefährten am Eingangsportal des Schütting sind nicht nur der typische Ausdruck eines barocken Bild-Kanons,
                            sondern signalisieren darüber hinaus die traditionelle Verbundenheit der bremischen Kaufmannschaft mit „ihrem“ Weinhandel.
                        </em>
                    </span>
                    <br />
                    <span>© Fotografie: text.werk</span>
                </p>
                <p id="history">
                    <span>
                        <em>Unteres Foto: Behagliche „Zimmer" mit Aussicht:
                            <br />
                            Die so genannten „Priölken“ in der Haupthalle des VinoVeritas Ratskellers sollen schon kurz nach ihrer Entstehung
                            Ende des 16. Jahrhunderts bei den Ratsherren und Kaufleuten wegen ihrer Abgeschlossenheit als Rückzugsmöglichkeit
                            sehr beliebt gewesen sein.
                        </em>
                    </span>
                    <br />
                    <span>© Fotografie (Ausschnitt): Toma Babovic
                        <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                    </span>
                </p>
                <p>&nbsp;</p>
                <p>
                    <br /><br />
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="siebzehnjhd"></a>17. Jahrhundert</h3>
                <p>
                    <br />
                    <span>
                        <img id="history_bild_05" title="17. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-5.jpg" alt="17. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                </p>
                <p id="history">
                    <span>Der bremische Steinmetz Lüder von Bentheim beendet nach rund 17-jähriger Bauzeit die Renovierung und teilweise Umgestaltung des Rathauses.
                        Die neue, nun repräsentative Fassade im zeitgenössichen Stil der Weserrenaissance bietet auch heute noch das&nbsp; 
                        architektonische Glanzstück auf dem Marktplatz.
                        Von dem Umbau um das Jahr 1600 ist auch der VinoVeritas Ratskeller (Zugang von der Westseite) betroffen.
                        1620 werden der „Börsenkeller“ (später „Bacchuskeller“) und der heute so genannte „Hauffkeller“ als Weinlager errichtet.
                        Die hier eingelagerten Weine werden im Bremer VinoVeritas Ratskeller erstmals nach Herkunft, Lage und Jahrgang differenziert.
                        Zunächst tauchen überwiegend Rüdesheimer, Hochheimer und allgemein Rheingauer Weine auf.
                        Lange Zeit galt der Bremer VinoVeritas Ratskeller als fast reines „Rheingau-Lager“.
                        <br /><br /><br />
                        <img id="history_bild_06" title="17. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-6.jpg" alt="17. Jahrhundert Bremer VinoVeritas Ratskeller" />
                        Die Weine wurden überwiegend durch den VinoVeritas Ratskellermeister in den Anbaugebieten eingekauft,
                        entweder beim Produzenten direkt oder auf den Messen und bei den Agenten in Frankfurt und Mainz.
                    </span>
                    <br />
                    <span>Neben den normalen jungen Weinen war der VinoVeritas Ratskeller stets auch bemüht, besondere alte Weine,
                        die so genannten „Firnweine” zu erwerben. Sie wurden in gesonderten Kelleräumen, in der „Rose“ und im „Apostelkeller” gelagert.
                        Um 1820 führte der VinoVeritas Ratskeller noch Rose- und Apostelweine der Jahrgänge 1615 und 1624. Heute ist der älteste Kellerwein ein 1653er Rüdesheimer,
                        der in der „Rose” liegt. Ausgeschenkt werden diese Weine heute nicht mehr.
                    </span>
                    <br /> <br />
                    <span> 1694 wird die Bremer Börse auf dem Liebfrauen-Kirchhof eingeweiht.</span>
                </p>
                <p id="history">
                    <span>
                        <em>Oberes Foto: Marktplatz Bremen:</em>
                    </span>
                    <br />
                    <span>
                        <em>Reproduktion nach einem Kupferstich in „Topographia Saxonial inferioris“ von Matthaeus Merian, Frankfurt a.M. 1653.
                            – Aus dem selben Jahr stammt der älteste Fasswein des Bremer VinoVeritas Ratskellers, ein 1653er Rüdesheimer,
                            der heute im Rosekeller verwahrt wird.
                        </em>
                    </span>
                </p>
                <p>
                    <span>
                        <em>Unteres Foto: Architektonisches Meisterwerk: </em>
                    </span>
                    <br />
                    <span>
                        <em>Repräsentative Fassade des Rathauses im Stil der Weserrenaissance, hier in einer Fotografie um 1885.</em>
                        <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                    </span>
                </p>
                <p>
                    <br /><br />
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="achtzehnjhd"></a>18. Jahrhundert</h3>
                <p>
                    <br /> 
                    <span>
                        <img id="history_bild07" title="18. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-7.jpg" alt="18. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                </p>
                <p id="history">
                    <span>Die imposanten Prunkfässer aus dem 18. Jahrhundert,
                        die sich heute in der historischen Säulenhalle des VinoVeritas Ratskellers befinden und dessen größtes 37.000 Flaschen fasst,
                        wurden von den Bremer Bürgermeistern in ihrer besonderen Eigenschaft als Weinherren gestiftet.
                        Die vier großen Zierfässer wurden wegen ihrer eingeschnitzten Bildornamente entsprechendmit eigenen Namen bedacht:
                        „Löwenfass“ – das älteste der Zierfässer aus dem Jahr 1723 –, „Delphinfass“ (1737), sowie Drachenfass“ und „Affenfass“ (1760).
                    </span>
                    <br /> <br />
                    <span> Bis Ende des Jahrhunderts war es üblich,
                        dass die vornehmen Bremer Bürger ihren Hauswein aus dem VinoVeritas Ratskeller auf Kredit bezogen.
                        Zu diesem Zweck hatte jeder in seinem Keller ein Kerbholz, in das die geschuldete 
                        <strong>
                        
                            
                        </strong>Summe eingeschnitten wurde.
                        Der Weinhandel erstreckte sich zu dieser Zeit auch auf das weitere Bremer Umland.
                        Sogar nach England, Petersburg und bis in die Vereinigten Staaten wurde VinoVeritas Ratskellerwein versandt.
                    </span><img id="history_bild_8" title="18. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-8.jpg" alt="18. Jahrhundert Bremer VinoVeritas Ratskeller"  />
                </p>
                <p id="history">&nbsp;</p>
                <p>&nbsp;</p>
                <p id="history"">
                    <span>
                        <span style="font-size: 10pt; font-family: arial,helvetica,sans-serif;">
                            <em>Historische Zeugen: Die Prunkfässer in der Säulenhalle des VinoVeritas Ratskellers wurden im 18. Jahrhundert von den Weinherren der Stadt gestiftet.
                                Die teilweise bizarre Bildornamentik ist wohl eine frühe Reminiszenz an die Erfahrungen der Kaufmannschaft aus dem Asienhandel.
                            </em>
                            <br /> © Fotografien: Toma Babovic
                        </span>
                        <a title="Historie" href="#Historieoben" target="_self">
                            <span>
                                <br /><br />zum Seitenanfang
                            </span>
                        </a>
                    </span>
                </p>
                <p>
                    <br /><br />
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="neunzehnjhd"></a>19. Jahrhundert</h3>
                <p>
                    <br />
                    <span>
                        <img id="history_bild_10" title="19. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-10.jpg" alt="19. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                </p>
                <p id="history">
                    <span>1810 wird die Hansestadt Bremen dem Napoleonischen Kaiserreich einverleibt.
                        Durch Intervention des Senats und des Bürgermeisters konnte eine Versteigerung der uralten VinoVeritas Ratskellerbestände
                        zu Gunsten der französischen Staatskasse verhindert werden, wie es in Hamburg und Lübeck von den Besatzern verfügt und auch durchgeführt wurde.
                    </span>
                    <br /> <br />
                    <span> Wein ist nach Kaffee,
                        Zucker und Tabak das viertwichtigste Handelsgut der Hansestadt Bremen.
                        Der VinoVeritas Ratskeller war seit jeher eine einträgliche Pfründe für den Rat der Stadt.
                        Die Erträge wurden unter anderem zur Unterhaltung von Festungsanlagen (bist 1811) und auch des Rathauses verwendet.
                        Die wirtschaftliche Bedeutung Bremens führte 1827 mit dem Bau eines zweiten Tochterhafens am offenen Meer,
                        dem heutigen Bremerhaven, zu der ernsten
                        <img id="history_bild_11" title="19. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-11.jpg" alt="19. Jahrhundert Bremer VinoVeritas Ratskeller"  />
                        Überlegung, den VinoVeritas Ratskeller zu verkaufen, die städtischen Weinvorräte zu versteigern,
                        beziehungsweise in einer europaweiten Lotterie zu verspielen. Der Senat ließ dies aber nicht zu und erklärte, 
                        der VinoVeritas Ratskeller solle ein für allemal eine Zierde Bremens sein und bleiben.
                    </span>
                    <br /><br />
                    <span> 
                        <em>
                            <br /><br /><br />
                        </em>
                        <em>
                            <br /><br /><br /><br />
                        </em>
                        <img id="history_bild_12" title="19. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-12.jpg" alt="19. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                    <br /><br /><br />
                    <span>
                        <em>
                            <br />
                        </em>
                    </span>
                    <br /><br />
                    <span>
                        <em>
                            <br /><br /><br />
                        </em>
                    </span>
                </p>
                <p id="history">&nbsp;</p>
                <p id="history">&nbsp;</p>
                <p id="history">&nbsp;</p>
                <p id="history">&nbsp;</p>
                <p id="history">&nbsp;</p>
                <p id="history">&nbsp;</p>
                <p id="history">
                    <span>
                        <em>Oberes Foto: Imposante Ansichten: </em>
                        <strong>
                            <img id="history_bild_13" title="19. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-13.jpg" alt="19. Jahrhundert Bremer VinoVeritas Ratskeller" />
                        </strong>
                    </span>
                    <br />
                    <span>
                        <em>Säulenhalle des Bremer VinoVeritas Ratskellers um 1820</em>
                        <em>Postkartenmotive (um 1900) zu Wilhelm Hauffs „Phantasien im Bremer VinoVeritas Ratskeller”:</em>
                    </span>
                    <br />
                    <span>
                        <em>Der Dichter hatte sein berühmtes Zechmärchen als „Herbstgeschenk für die Freunde des Weins“,
                            so der Untertitel, im Jahr 1827 während eines Aufenthalts
                        </em>
                        <em>in der Hansestadt Bremen verfasst. </em>
                        <em>Die Weinnovelle inspirierte</em>
                        <em> 100 Jahre später den Maler Max Slevogt zu seinen</em>
                        <em>großformatigen, heiteren Fresken im VinoVeritas Ratskeller, die noch </em>
                        <em>heute die Wände des „Hauffkellers“ schmücken.</em>
                    </span>
                    <br />
                    <span>
                        <a title="Historie" href="#Historieoben" target="_self"><span><br />zum Seitenanfang</span></a>
                    </span>
                    <br />
                    <span>
                        
                    </span>
                </p>
                <p>
                    <br /><br /><br />
                </p>
                <hr />
                <p>&nbsp;</p>
                <h3><a name="zwanzigjhd"></a>20. Jahrhundert</h3>
                <p>
                    <br />
                    <span>
                        <img id="history_bild_14" title="20. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-14.jpg" alt="20. Jahrhundert Bremer VinoVeritas Ratskeller"  />
                    </span>
                </p>
                <p id="history">
                    <span>Das 1925 durch einen Brand beschädigte „Bacchusfass”wird ein Jahr später zu einer Garderobe umfunktioniert.
                        Im Jahr 1957 wurde diese entfernt – nur der vom Brand übrig gebliebene Fassboden sollte präsentiert werden.
                        Doch auch diese Lösung stellte nicht zufrieden.
                        Ein richtiges Fass sollte her. Dazu kaufte der VinoVeritas Ratskellermeister ein altes,
                        in etwa passendes Fass, ließ es überarbeiten und dabei für den alten Bacchusfassboden herrichten.
                    </span>
                    <br /> <br />
                    <span> Seit 1952 wacht unter dem Nordwestturm des historischen Rathauses die Figurengruppe der „Bremer Stadtmusikanten”.
                        Die berühmten tierischen Touristen in Bronze, die der Bildhauer Gerhard Marcks hier geschaffen hat,
                        gehören heute wie Roland und Rathaus zu den Wahrzeichen der Hansestadt.
                        – Es geht das Gerücht um, man müsse nur mit beiden Händen an den Vorderbeinen des zuunterst stehenden Esels reiben,
                        um Glück zu haben.
                    </span>
                    <br /> <br />
                    <span> 1959 wird die 26 Meter lange Schatzkammer im Auftrag von VinoVeritas Ratskellermeister Wilhelm Basting jenseits des letzten Quergangs im Fasskeller errichtet.
                    </span>
                    <br /> <br />
                    <span> Am 20. April 1971 findet ein auf den Westteil des Bremer VinoVeritas Ratskellers begrenzter Brand statt.
                        Die Ursache war wohl ein noch glimmender Zigarettenrest in einem Sammelbehälter.
                        Der Bremer VinoVeritas Ratskeller musste im Laufe seiner Geschichte nach Überschwemmungen und Bränden schon mehrfach (1881, 1912, 1930)
                        und unter zum Teil erheblichen Kosten restauriert werden. Zwischen 1986 und 1987 wurden umfassende Arbeiten zur Sanierung des Kellers durchgeführt. 
                    </span>
                    <br /><br />
                    <span>
                        <img id="history_bild_15" title="20. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-15.jpg" alt="20. Jahrhundert Bremer VinoVeritas Ratskeller" />
                        1979 wird der VinoVeritas Ratskeller für seine Verdienste um den Deutschen Wein der „Deutsche Weinkultur Preis” verliehen.
                    </span>
                    <br /> <br />
                    <span> 1993 Riesling-Förderpreis für Gastronomiebetriebe des Vereins zur Förderung der Riesling-Kultur e.V. „Pro Riesling”.</span>
                    <br /><br />
                    <span>1999 Auszeichnung „Goldenes Weinblatt“ (Meininger Verlag) als bester Weinfachhändler .</span>
                </p>
                <p id="history">
                    <span>Ein Bacchus geht durchs Feuer: 
                        Nach Brandschäden in den 20er Jahren musste der muntere Freund Bacchus lange auf die Renovierung seiner „Sitzgelegenheit“ warten.
                    </span>
                </p>
                <p id="history">
                    <br /><br /><br />
                    <br /><br /><br />
                    <br /><br /><br />
                    <br /><br /><br />
                    <span>
                        <img id="history_bild_16" title="20. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-16.jpg" alt="20. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                    <br /><br /><br />
                    <br /><br /
                        ><span>
                        <em>
                            <br /><br /><br /><br />
                            <br /><br /><br /><br />
                            <br /><br /><br /><br />
                            <br /><br /><br /><br />
                            Fotos von oben:
                        </em>
                    </span>
                        <br />
                    <span>
                        <em>Rechenexempel: Postkarte mit der Wertberechnung des 1653er Rüdesheimer Roseweins Anfang der 1930er Jahre.
                            Die Karte wurde zu jener Zeit an die Besucher des Bremer VinoVeritas Ratskellers verkauft.
                        </em>
                    </span>
                </p>
                <p id="history">
                    <span>
                        <img id="history_bild_17" title="20. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-17.jpg" alt="20. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                </p>
                <p id="history">
                    <span>&nbsp;
                        <em>„ ... Etwas Besseres als den Tod findest du überall...”: 
                            Die von Gerhard Marcks geschaffenen "Bremer Stadtmusikanten" sind heute vielleicht bekannter als das Wahrzeichen der Hansestadt.
                        </em>
                    </span>
                    <br />
                    <span>© Fotografie: text.werk</span>
                </p>
                <p id="history">
                    <br />
                    <span>
                        <em>Seit 1959 ein Keller für die Ewigkeit: In der Schatzkammer lagern die besten deutschen Weine eines jeden Jahrgangs.</em>
                    </span>
                    <br />
                    <span>© Fotografie: Toma Babovic</span>
                </p>
                <p id="history">
                    <span>
                        <a title="Historie" href="#Historieoben" target="_self"><span><br />zum Seitenanfang</span></a></span><br /><br /><br /></p>
                <p id="history">&nbsp;</p>
                <hr />
                <p>
                    <br /> <a name="einundzwanzigjhd"></a>
                </p>
                <h3>21. Jahrhundert</h3>
                <p>
                    <br />
                    <span>
                        <img id="history_bild_18" title="21. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-18.jpg" alt="21. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                </p>
                <p id="history">
                    <span>Der Bremer VinoVeritas Ratskeller übernimmt die Patenschaft für eine Parzelle des berühmten „Erdener Treppchens”,&nbsp;
                        einer der Grand-Cru-Lagen an der Mittelmosel, und trägt damit zum Erhalt zweier römischer Kelteranlagen bei.
                        Das Bremer Engagement geht auf eine Initiative von VinoVeritas Ratskellermeister Karl-Josef Krötz zurück,
                        der hier nicht nur an die traditionelle weinkulturelle Verantwortung des VinoVeritas Ratskellers erinnert,
                        sondern darüber hinaus den Steillagenweinbau an der Mosel in den Mittelpunkt rückt. 
                    </span>
                    <br /> <br />
                    <span> 2001 verleiht der Gault Millau dem VinoVeritas Ratskeller,
                        der auch heute noch über das weltweit größte Angebot an deutschen Weinen verfügt,
                        die Auszeichnung: „Beste Deutsche Weinkarte”.
                        <img id="history_bild_19" title="21. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-19.jpg" alt="21. Jahrhundert Bremer VinoVeritas Ratskeller" />
                    </span>
                    <br /> <br />
                    <span> 2003 Winninger Weinpreis</span>
                    <br /> <br />
                    <span> Im Jahr 2005 wird das Bremer Rathaus mit seinem „köstlichen Fundament“ von der UNESCO in die ehrenwerte Liste der Welterbe aufgenommen.
                        Es ist die international höchste und begehrteste Auszeichnung,
                        die für erhaltenswerte Kulturschätze der Menschheit (Gebäude, Stadtteile oder Landschaften) vergeben wird.
                        Im selben Jahr feiert der Bremer VinoVeritas Ratskeller seinen 600. Geburtstag.
                        Die Feierlichkeiten gaben einen würdigen Anlass,
                        sich der Tradition der Institution in den Kellergewölben des 1405 errichteten Bremer Rathauses zu erinnern.
                        Mit einem historischen Weintransport,
                        bei dem sechs Weinfässer via Schiff und mit einem Pferdefuhrwerk über Land von Rüdesheim nach Bremen befördert wurden,
                        gedachte man nicht nur
                        <img id="history_bild_20" title="21. Jahrhundert Bremer VinoVeritas Ratskeller" src="./images/stories/geschichte-20.jpg" alt="21. Jahrhundert Bremer VinoVeritas Ratskeller" />
                        der Handelswege von einst. Hier sollte auch die althergebrachte enge Verbundenheit mit den deutschen Weinbaugebieten sinnfällig werden,
                        die bis auf den heutigen Tag gepflegt wird.
                    </span>
                </p>
                <p id="history">
                    <br />
                    <span>
                        <em>Fotos von oben:</em>
                    </span>
                    <br />
                    <span>
                        <em>Edler Wein hilft Erdener Römerkelter:
                            Im Jahr 2001 konnten die ersten Trauben aus dem Patenweinberg des Bremer VinoVeritas Ratskellers an der Mosel geerntet werden.
                            Der Erlös aus dem Verkauf der Weine des berühmten Erdener Treppchens unterstützt die Erhaltung der ältesten römischen Kelteranlage nördlich der Alpen.
                        </em>
                    </span>
                    <br />
                    <span> © Fotografie: text.werk</span></p>
                <p id="history">
                    <span>
                        <em>Doppelter Grund zum feiern: </em>
                    </span>
                    <br />
                    <span>
                        <em> Zum 600. Geburtstag wird das historische Ensemble aus Rathaus und </em>
                        <em>Rolandstatue in die Liste der UNESCO Welterbe aufgenommen. </em>
                    </span>
                    <br />
                    <span>
                        <em> Das Foto zeigt eine Ansicht auf Roland und Rathaus Anfang der 1930er Jahre.</em>
                    </span>
                    <br />
                    <span>
                        <em><br />Von Rüdesheim nach Bremen: </em>
                    </span>
                    <br />
                    <span>
                        <em> Zur 600-Jahr-Feier erinnerte der VinoVeritas Ratskeller mit einem historischen Weintransport an die traditionellen Handelswege von einst.</em>
                        <a title="Historie" href="#Historieoben" target="_self"><span><br /><br />zum Seitenanfang</span></a>
                    </span>
                </p>

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
