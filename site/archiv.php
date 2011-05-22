<?php
// Hole header, menu und slideshow
include 'header.html';
include 'top.html';
include 'slideShow.php';

// Hole heuteiges Datum
$today = getdate();

// Hole alle Bilder 
$images = getOldImages();
// Hole die anzahl -> damit wir in der For-Schleife ein ende haben
$max = sizeof($images[0]);
//$limit = 7;

/* Damit das Archiv am richtigen Ort mit dem richtigen Design ausgegeben wird,
   muss es hier rein
 */
echo '<div class="wrapper">
  <div class="content">
    <div id="text">
      <h1>Archiv</h1>';

/* Hole aus dem ersten Bild (das aktuellste) das Datum 
   und konvertiere es in ein Timestamp
   Damit das erste Bild nicht alleine ist, muss man das $newDate auf 
   das aktuellste setzten */
$newDate = date('d-m-Y',strtotime($images[1][0]));
// Erster Titel (neustes Datum) ausgeben
echo '<h2>'.$newDate.'</h2>';

/* Für jedes Bild im $images wird das datum herausgelesen
   wenn es gleich ist wie das Anfangsdatum, müssen wir keinen 
   neuen Titel machen.
   Damit die Bilder mit JavaScript aufpoppen, muss rel="inbox" mitgegeben werden*/
for($i=0; $i<$max; $i++) {
  $date = date('d-m-Y',strtotime($images[1][$i]));

  if($newDate == $date) {
      echo '<a href="'.$images[0][$i].'" rel="ibox" title="'.$images[2][$i].'"><img src="'.$images[0][$i].'" alt="Bild" width="200" height="100"/></a>' ;

      /* Ist das Datum älter als das gesetzte, muss ein neuer Titel 
         gesetzt werden*/
  } else {
    echo '<h2>'.$date.'</h2>';
    echo '<a href="'.$images[0][$i].'"" rel="ibox" title="'.$images[2][$i].'"><img src="'.$images[0][$i].'" alt="Bild" width="200" height="100" /></a>';
  }
  // Neues bzw altes Datum setzten
  $newDate = $date;
}
echo '</div>
  </div>
</div>
<br class="clear" />
</body>
</html>';
?>

