<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
?>

<?php
session_start();
if (!isset($_SESSION['admin_adi']) || !isset($_COOKIE['admin'])) {
    header("Location: admin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Paneli</title>
</head>
<body>
    <h1>Hoşgeldiniz, <?php echo $_SESSION['admin_adi']; ?></h1>
    <a href="admin_kaydet.php">Admin Kaydet</a><br>
    <a href="admin_görüntüle.php">admin görüntüle</a>    <br>
    <a href="kullanici_değiştir.php">Kullanıcı görüntüle</a><br>
    <a href="balik_kaydet.php">balik ekle</a>    <br>
    <a href="balik_görüntüle.php">balik görüntüle</a>    <br>
    
    <a href="cikis.php">çıkış</a>
</body>
</html>
