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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_adi = güvenli($_POST['admin_adi'], $veritabani);
    $admin_parola = güvenli($_POST['admin_parola'], $veritabani);

    $sql = "INSERT INTO admin (admin_adi, admin_parola) VALUES ('$admin_adi', '$admin_parola')";
    if ($veritabani->query($sql) === TRUE) {
        echo "Yeni admin başarıyla kaydedildi.";
    } else {
        echo "Hata: " ;
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Kaydet</title>
</head>
<body>
    <form method="post" action="">
        <label for="admin_adi">Kullanıcı Adı:</label>
        <input type="text" id="admin_adi" name="admin_adi" required><br>
        <label for="admin_parola">Parola:</label>
        <input type="password" id="admin_parola" name="admin_parola" required><br>
        <input type="submit" value="Kaydet">
    </form>
    <br>
    
    <a href="admin_paneli.php">admin paneli</a>
    <a href="cikis.php">çıkış</a>

</body>

</html>
