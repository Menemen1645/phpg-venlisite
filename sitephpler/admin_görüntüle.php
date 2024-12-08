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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = güvenli($_POST['id'], $veritabani);
    $sql = "DELETE FROM admin WHERE idadmin='$id'";
    if ($veritabani->query($sql) === TRUE) {
        echo "Kullanıcı başarıyla silindi.";
    } else {
        echo "Hata: " ;
    }
}

$sql = "SELECT * FROM admin";
$result = $veritabani->query($sql);
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Kullanıcı Değiştir</title>
</head>
<body>
    <h1>Kullanıcılar</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Kullanıcı Adı</th>
            <th>İşlem</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idadmin'] . "</td>";
                echo "<td>" . $row['admin_adi'] . "</td>";
                echo "<td>
                        <form method='post' action=''>
                            <input type='hidden' name='id' value='" . $row['idadmin'] . "'>
                            <input type='submit' name='delete' value='Sil'>
                        </form>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>Kayıt bulunamadı</td></tr>";
        }
        ?>
    </table>
    <br>
    
    <a href="admin_paneli.php">admin paneli</a>
    <a href="cikis.php">çıkış</a>
</body>
</html>
