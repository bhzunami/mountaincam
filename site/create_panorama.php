<?php
	//include 'inc/dbConnect.php';
	include 'inc/config.php';
	
	$socket = fsockopen ( $camAddress );
	if($socket){
	//REQUIRES AUTH FIRST
	fwrite($fp, "USER root\r\n");
	fwrite($fp, "PASS gibbiX12345\r\n"); 
	
	fopen("http://" . $camAddress . "/cgi-bin/camctrl.cgi?move=right", "r");
	}
	echo '<img src="http://' . $camAddress . 'cgi-bin/video.jpg" alt="bild1">';
	//sleep(15);
	echo '<img src="http://' . $camAddress . 'cgi-bin/video.jpg" alt="bild2">';
	//sleep(15);
	echo '<img src="http://' . $camAddress . 'cgi-bin/video.jpg" alt="bild3">';
	//sleep(15);
	echo '<img src="http://' . $camAddress . 'cgi-bin/video.jpg" alt="bild4">';
?>