<?php
$db = mysql_connect('localhost','mountaincam', 'mountain');

if (!$db) {
    die ('Konnte keine Verbindung zur Datenbank aufbauen: <br />'.mysql_error());
 }

mysql_select_db('mountaincam');

?>