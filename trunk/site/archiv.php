<?php
include 'header.html';
include 'top.html';
include 'slideShow.php';
$images = getOldImages();
$max = sizeof($images[0]);

for($i=0; $i<$max; $i++) {
  echo '<img src="'.$images[0][$i].'" alt="Bild" width="100" height="100" />';
}

$date = getdate();

$today = array();
for($i=0; $i<$max; $i++) {
  echo '<br />';
  if($images[1][$i] == $date[day]) {
    echo 'JUPPIIII';
  }
  echo $images[1][$i];
  echo '<br />';
}

echo $date[hours];
/*
echo $images[0][0];
echo '<br />';
echo $images[1][0];
echo '<br /><br /><br /><br />';
print_r($images);
*/
?>

