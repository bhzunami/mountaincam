<?php
include 'inc/dbConnect.php';

function getNewImages() {
  $images = array();
  $query = "select i.id, i.name, i.pfad, i.date, c.name as category from Images i, Category c where i.Category_id = c.id order by date desc limit 3";

  $result = mysql_query($query);
  while( $row = mysql_fetch_array($result) ) {
    $images[] = $row['pfad'];
  }
  return $images;
}


function getOldImages() {
  $images = array();

  $path = array();
  $date = array();
  $query = "select i.id, i.name, i.pfad, i.date, c.name as category from Images i, Category c where i.Category_id = c.id order by date desc";

  $result = mysql_query($query);
  while( $row = mysql_fetch_array($result) ) {
    $path[] = $row['pfad'];
    $date[] = $row['date'];
  }
  $images[0] = $path;
  $images[1] = $date;
  return $images;
}
?>
