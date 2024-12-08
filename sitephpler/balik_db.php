<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
?>

<?php
session_start();
include 'data.php';

if (!isset($_SESSION['admin_adi']) || !isset($_COOKIE['admin'])) {
    header("Location: admin.php");
    exit();
}

include "data.php";
require_once 'config.php';


$query = "SELECT balik_adi, balik_resmi FROM baliklar";
$result = $veritabani->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $balik_adi = htmlspecialchars($row['balik_adi']);
        $balik_resmi = htmlspecialchars($row['balik_resmi']);

        echo '<div class="fish-card">';
        echo '<a href="detay.php?id=' . urlencode($balik_adi) . '">';
        echo '<img src="' . $balik_resmi . '" alt="' . $balik_adi . '">';
        echo '<p>' . $balik_adi . '</p>';
        echo '</a>';
        echo '</div>';
    }
} else {
    echo "Veritabanında balık bilgisi bulunamadı.";
}

$veritabani->close();
?>
