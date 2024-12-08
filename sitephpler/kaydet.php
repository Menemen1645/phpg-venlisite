<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
?>


<?php
include 'data.php';

function güvenlik($data, $veritabani) {
    $data = trim($data); 
    $data = stripslashes($data);
    $data = htmlspecialchars($data); 
    $data = $veritabani->real_escape_string($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $balikAdi = güvenlik($_POST['balik_adi'], $veritabani);
    $balikResimi = güvenlik($_POST['balik_resimi'], $veritabani);
    $balikBilgi = güvenlik($_POST['balik_bilgi'], $veritabani);

   
    if (!filter_var($balikResimi, FILTER_VALIDATE_URL)) {
        echo "Geçersiz URL.";
        exit;
    }

    $sorgu = $veritabani->prepare("INSERT INTO baliklar (balik_adi, balik_resimi, balik_bilgi) VALUES (?, ?, ?)");
    $sorgu->bind_param("sss", $balikAdi, $balikResimi, $balikBilgi);

    if ($sorgu->execute()) {
        echo 'Balık başarıyla kaydedildi!';
    } else {
        echo 'Balık kaydedilemedi!';
    }

    $sorgu->close();
    $veritabani->close();
}
?>
