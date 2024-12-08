<?php

$servername = "localhost";
$username = "root";
$password = "SİZİNPAROLANIZ ";//VERİTABANI PROLANIZI VE İSİMİNİİZİ GİRİN
$dbname = "veritabani";


$veritabani = new mysqli($servername, $username, $password, $dbname);


if ($veritabani->connect_error) { 
    die("Bağlantı hatası: " . $veritabani->connect_error);
}

$veritabani->set_charset("utf8mb4");
function güvenli($data, $veritabani) {
    $data = trim($data); 
    $data = stripslashes($data); 
    $data = htmlspecialchars($data); 
    $data = $veritabani->real_escape_string($data); 
    return $data;
}
    

?>
        