<?php
include 'inc/dbConnect.php';

/* Holt aus der Datenbank die 3 neuesten Bilder
   und gibt den Pfad der Bilder im $image Array zurück */
function getNewImages() {
  $images = array();
  $query = "select i.id, i.name, i.pfad, i.date, c.name as category from Images i, Category c where i.Category_id = c.id order by date desc limit 3";

  $result = mysql_query($query);
  while( $row = mysql_fetch_array($result) ) {
    $images[] = $row['pfad'];
  }
  return $images;
}

/* Holt alle Bilder aus der Datenbank sortiert nach dem neusten
   und gibt ein zweidimensionales $images Array zurück

   [0][*] = Pfad zum Bild
   [1][*] = Datum des Bildes
   [2][*] = Kategorie */
function getOldImages() {
  $images = array();

  $path = array();
  $date = array();
  $query = "select i.id, i.name, i.pfad, i.date, c.name as category from Images i, Category c where i.Category_id = c.id order by date desc";

  $result = mysql_query($query);
  while( $row = mysql_fetch_array($result) ) {
    $path[] = $row['pfad'];
    $date[] = $row['date'];
    $desc[] = $row['category'];
  }
  $images[0] = $path;
  $images[1] = $date;
  $images[2] = $desc;
  return $images;
}
?>
