<?php
/* Die Index datei, includet alle benötigten Html und php
   Dateien, die für die Startseite gebraucht werden.
*/
/* Die header Datei beinhaltet nur den <head> Tag einer HTML seite
   Und die Includes der scripte und style sheet
   Scripte:
   - jquery-1.5.js & jquery_cross-slide.min.js für die Slide show
   - ibox.js für das Archiv. Vergrössern der Bider beim klicken
 */
include 'header.html';
// In der top.html ist das Menü  und Titel abgelegt
include 'top.html';
// erzeugt die Sliedeshow die auf jeder Seite angezeigt wird
include 'slideShow.php';
// Der Text unter der Sliedeshow
include 'bottom.html';

?>