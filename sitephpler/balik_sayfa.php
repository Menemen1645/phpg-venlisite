<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
?>


<?php
session_start();

include 'data.php';

if (isset($_GET['id'])) {
    $balikId = intval($_GET['id']);
    $_SESSION['balik_id'] = $balikId;
} elseif (isset($_SESSION['balik_id'])) {
    $balikId = $_SESSION['balik_id'];
} else {
    header("Location: index.php");
    exit();
}

$sorgu = $veritabani->prepare("SELECT balik_adi, balik_resimi, balik_bilgi FROM baliklar WHERE idbaliklar = ?");
$sorgu->bind_param("i", $balikId);
$sorgu->execute();
$sonuc = $sorgu->get_result();

if ($sonuc->num_rows > 0) {
    $satir = $sonuc->fetch_assoc();
    $balikAdi = htmlspecialchars($satir['balik_adi']);
    $balikResimi = htmlspecialchars($satir['balik_resimi']);
    $balikBilgi = htmlspecialchars($satir['balik_bilgi']);
} else {
    echo "Balık bulunamadı.";
    exit();
}

$sorgu->close();
$veritabani->close();
?>


<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Balıklar</title>
    <link rel="stylesheet" href="ana.css">
</head>
<body>
    <header>
        <div class="menu">
            <a href="index.php">Ana Sayfa</a>
            
        </div>
        <div class="user-menu">
            <?php if (isset($_SESSION['kullanici_adi'])): ?>
                <a href="admin.php"><?php echo htmlspecialchars($_SESSION['kullanici_adi']); ?></a>
                <a href="cikis.php">Çıkış Yap</a>
            <?php else: ?>
                <a href="kullanici_girisi.php">Giriş Yap</a>
                <a href="kayıt_ol.php">Kayıt Ol</a>
            <?php endif; ?>
        </div>
    </header>

    <main>
        <div class="balik-detay">
            <img src="<?php echo $balikResimi; ?>" alt="<?php echo $balikAdi; ?>">
            <h1><?php echo $balikAdi; ?></h1>
            <p><?php echo $balikBilgi; ?></p>
        </div>
    </main>
    <?php
    if (isset($_COOKIE['kullanici_id'])) {
        $kullanici_id = $_COOKIE['kullanici_id'];
    
 
    } else {
    header('Location: giris.php'); 
    exit;
    }
?>
<?php


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location:kullanici_girisi.php');
    exit();
} 
?>

</body>
</html>
