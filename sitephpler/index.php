<?php
session_start();
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
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
                <?php echo htmlspecialchars($_SESSION['kullanici_adi']); ?>
                <a href="cikis.php">Çıkış Yap</a>
            <?php else: ?>
                <a href="kullanici_girisi.php">Giriş Yap</a>
                <a href="kayıt_ol.php">Kayıt Ol</a>
            <?php endif; ?>
        </div>
    </header>
    <main>
        <div class="resim-galeri">
            <?php
            include 'data.php';

            $sorgu = $veritabani->prepare("SELECT idbaliklar, balik_adi, balik_resimi FROM baliklar");
            $sorgu->execute();
            $sonuc = $sorgu->get_result();

            while($satir = $sonuc->fetch_assoc()) {
                $balikAdi = htmlspecialchars($satir['balik_adi']);
                $balikResimi = htmlspecialchars($satir['balik_resimi']);
                $balikId = htmlspecialchars($satir['idbaliklar']);

                echo '<div class="resim-kutu">';
                echo '<a href="balik_sayfa.php?id=' . $balikId . '"><img src="' . $balikResimi . '" alt="' . $balikAdi . '"></a>';
                echo '<div class="resim-bilgi">' . $balikAdi . '</div>';
                echo '</div>';
            }

            $sorgu->close();
            $veritabani->close();
            ?>
        </div>
    </main>
</body>
</html>
