<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
?>

<?php
session_start();
include 'data.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_adi = güvenli($_POST['admin_adi'], $veritabani);
    $admin_parola = güvenli($_POST['admin_parola'], $veritabani);

    $sql = "SELECT * FROM admin WHERE admin_adi='$admin_adi' AND admin_parola='$admin_parola'";
    $result = $veritabani->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['admin_adi'] = $admin_adi;
        setcookie("admin", $admin_adi, time() + (86400 * 30), "/"); 
        header("Location: admin_paneli.php");
    } else {
        echo "Hatalı kullanıcı adı veya parola";
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Admin Giriş</title>
</head>
<body>
    <form method="post" action="">
        <label for="admin_adi">Kullanıcı Adı:</label>
        <input type="text" id="admin_adi" name="admin_adi" required><br>
        <label for="admin_parola">Parola:</label>
        <input type="password" id="admin_parola" name="admin_parola" required><br>
        <input type="submit" value="Giriş Yap">
    </form>
</body>
</html>
