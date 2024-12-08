<?php
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

</head>
<?php
session_start();
if (!isset($_SESSION['admin_adi']) || !isset($_COOKIE['admin'])) {
    header("Location: admin.php");
    exit();
}
?>


<body>

    <main>
        <h1>Yeni Balık Ekle</h1>
        <form action="kaydet.php" method="POST">
            <div>
                <label for="balik_adi">Balık Adı:</label>
                <input type="text" id="balik_adi" name="balik_adi" required>
            </div>
            <div>
                <label for="balik_resimi">Balık Resmi URL:</label>
                <input type="url" id="balik_resimi" name="balik_resimi" required>
            </div>
            <div>
                <label for="balik_bilgi">Balık Bilgisi:</label>
                <textarea id="balik_bilgi" name="balik_bilgi" required></textarea>
            </div>
            <button type="submit">Kaydet</button>
        </form>
    </main>
    <br>
    
    <a href="admin_paneli.php">admin paneli</a>
    <a href="cikis.php">çıkış</a>
</body>
</html>
