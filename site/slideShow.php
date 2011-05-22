<?php
// Functionen holen
include 'inc/functions.php';
/* Holt sich mit der Function getNewImages()
   die 3 neusten Bilder und zeigt sie in einer
   SlideShow an */
$image = getNewImages();
// Content mit dem ersten Bild ausgeben
echo '    <div class="wrapper img">
      <div class="content">
	<div id="image" >
        <img src="'.$image[0].'" alt="Bild"/>

	</div>
      </div>
    </div>
    <br class="clear" />';

// Script mit der slide function aufrufen
echo " <script language='JavaScript'>
$(function() {
$('#image').crossSlide({
  sleep: 2,
  fade: 1
}, [
";
foreach($image as $picture) {
  echo"  { src: '".$picture."' },";
}
echo"  { src: '".$image[0]."' }"; 
echo "]); });
    </script>";

?>