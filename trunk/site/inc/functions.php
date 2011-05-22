<?php
include 'inc/dbConnect.php';

/**
 * Get a web file (HTML, XHTML, XML, image, etc.) from a URL.  Return an
 * array containing the header fields and content.
 */
function get_web_page( $url )
{
    $options = array( 'http' => array(
        'user_agent'    => 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)',    // who am i
        'max_redirects' => 10,          // stop after 10 redirects
        'timeout'       => 120,         // timeout on response
    ) );
    $context = stream_context_create( $options );
    $page    = @file_get_contents( $url, false, $context );
 
    $result  = array( );
    if ( $page != false )
        $result['content'] = $page;
    else if ( !isset( $http_response_header ) )
        return null;    // Bad url, timeout

    // Save the header
    $result['header'] = $http_response_header;

    // Get the *last* HTTP status code
    $nLines = count( $http_response_header );
    for ( $i = $nLines-1; $i >= 0; $i-- )
    {
        $line = $http_response_header[$i];
        if ( strncasecmp( "HTTP", $line, 4 ) == 0 )
        {
            $response = explode( ' ', $line );
            $result['http_code'] = $response[1];
            break;
        }
    }
    return $result;
}

/**
 * Reset the camera to the wished side. Does it in the loop you defined.
 */
function set_camera_position( $side, $repetition, $camAddress){
	for($i = 0; $i<$repetition; $i++){
		get_web_page($camAddress . "/cgi-bin/camctrl.cgi?move=" . $side);
		sleep(2);
	}
}

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

//Lösche ein Ordner mit allen Dateien
function delete_directory($dirname) {
  //Überprüft ob es überhaupt diesen Ordner gibt
   if (is_dir($dirname))
     // Wenn ja gehe hinein
      $dir_handle = opendir($dirname);
   // bei Fehler retrun false
   if (!$dir_handle)
      return false;
   /* Solange wir eine Datei im Ordner finden (und das ist kein . oder .. )
    löschen wir diese
    Ist es ein Ornder rufen wir die Function auf, um in diesem Ordner alle Files    zu löschen (rekursiv)
   */
   while($file = readdir($dir_handle)) {
      if ($file != "." && $file != "..") {
         if (!is_dir($dirname."/".$file))
            unlink($dirname."/".$file);
         else
            delete_directory($dirname.'/'.$file);    
      }
   }
   // gehen aus dem Ordner heraus
   closedir($dir_handle);
   // da dieser jetzt leer ist, kann man den ordner löschen
   rmdir($dirname);
   // alles OK
   return true;
}

?>
