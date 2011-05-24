<?php
// Addresse der Kamera
        $camAddress ='http://root:gibbiX12345@192.168.10.134';
//Falls die Webapplikation auf einem Windows-Rechner läuft muss man die Pfade
//richtig anpassen
	if(PHP_OS == "WIN32" || PHP_OS == "WINNT"){
		$imagepath = "C:\\xampp\htdocs\mountaincam\images\\";
	}
//Default Pfad ist /var/www/mountaincam/images
	else{
		$imagepath = "/var/www/mountaincam/images/";
	}
	
?>
