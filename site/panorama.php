<?php
echo header('Content-Type: image/jpeg');
include 'inc/config.php';
include 'inc/functions.php';

// Position the Webcam to the left side
//get_web_page('http://'. $camUser . ':' . $camPass . '@' . $camAddress . "/cgi-bin/camctrl.cgi?move=home");
get_web_page($camAddress . "/cgi-bin/camctrl.cgi?move=home");
sleep(3);
set_camera_position("left", 5, $camAddress);

/* Create pictures */
file_put_contents($imagepath ."image0.jpg", file_get_contents($camAddress . '/cgi-bin/video.jpg'));
set_camera_position("right", 2, $camAddress);
file_put_contents($imagepath . "image1.jpg", file_get_contents($camAddress . '/cgi-bin/video.jpg'));
set_camera_position("right", 2, $camAddress);
file_put_contents($imagepath . "image2.jpg", file_get_contents($camAddress . '/cgi-bin/video.jpg'));

// Set Resources to use the saved images later
$images = array();
$images[0] = imagecreatefromjpeg($imagepath ."image0.jpg");
$images[1] = imagecreatefromjpeg($imagepath ."image1.jpg");
$images[2] = imagecreatefromjpeg($imagepath ."image2.jpg");

$sizes = array();
$sizes[0] = 0;
$sizes[1] = 640;
$sizes[2] = 1280;

$new_image_width = 640*3;//imagesx($images[0]) *3;
$new_image_height = 480;//imagesy($images[0]);

$new_image = imagecreatetruecolor($new_image_width, $new_image_height);

for($i=0; $i<3; $i++) {
  imagecopymergegray($new_image, $images[$i], $sizes[$i], 0, 0, 0, $new_image_width, $new_image_height ,100);
}

// Save panorama image temporarly
imagejpeg($new_image, $imagepath . 'temp.jpg', 100);
imagejpeg($new_image);

// Create the destination folder
if(!is_dir($imagepath ."/". date("d-m-Y") )){
	mkdir($imagepath ."/". date("d-m-Y"));
}
// morning, lunch, evening
if(date('G')<9){
	$time = 'morning';
}
elseif(date('G')>9 and date('G')<13){
	$time = 'lunch';
}
else{
	$time = 'evening';
}
// Save the image in the destination
copy( $imagepath . 'temp.jpg', $imagepath . date("d-m-Y") .'/'. $time . '.jpg');

// insert data
//include 'inc/dbConnect.php';
//mysql_query("INSERT INTO 

foreach($images as $image) {
  imagedestroy($image);
}
//imagedestroy($new_image);*/
?>