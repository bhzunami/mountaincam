<?php
include 'inc/dbConnect.php';
include 'inc/functions.php';

//error_reporting(E_ALL);
// hole alle Bilder die älter sind als 14 Tage
$query = "SELECT * FROM Images WHERE DATE_SUB(CURDATE(),INTERVAL 14 DAY) >= date";
$result = mysql_query($query);
// lösche alle diese Bilder
while( $row = mysql_fetch_array($result) ) {
  $path = split( "/",$row['pfad']);
  delete_directory('../images/'.$path[2]);
}
// lösche sie aus der Datenbank
$delete =  mysql_query("DELETE FROM Images WHERE DATE_SUB(CURDATE(),INTERVAL 14 DAY) >= date");

?>