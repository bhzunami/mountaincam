<?php
include 'inc/getImages.php';
$image = getNewImages();
echo '    <div class="wrapper img">
      <div class="content">
	<div id="image" >
        <img src="'.$image[0].'" alt="Bild"/>

	</div>
      </div>
    </div>
    <br class="clear" />';

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

$date = getdate();

//Am Morgen
if($date[hours]>=6 && $date[hours]<12) {
  //echo 'MORGEN';
}

//Am Mittog
if($date[hours]>=12 && $date[hours]<18) {
  //  echo 'MITTAG <br />';
}

//Am Abend
if($date[hours]>=18 && $date[hours]<6) {
  //echo 'ABEND';
}
?>