<?php
$images = array();
$images[0] = imagecreatefromjpeg('../images/1.jpg');
$images[1] = imagecreatefromjpeg('../images/2.jpg');
$images[2] = imagecreatefromjpeg('../images/3.jpg');

$sizes = array();
$sizes[0] = 0;
$sizes[1] = 640;
$sizes[2] = 1280;

$new_image_width = imagesx($images[0]) *3;
$new_image_height = imagesy($images[0]);


$new_image = imagecreatetruecolor($new_image_width, $new_image_height);

for($i=0; $i<3; $i++) {
  imagecopymerge($new_image, $images[$i], $sizes[$i], 0, 0, 0, $new_image_width, $new_image_height ,100);
}


//imagejpeg($new_image);
imagejpeg($new_image, '/var/www/mountaincam/images/test.jpg', 100);


foreach($images as $image) {
  imagedestroy($image);
}
imagedestroy($new_image);
?>