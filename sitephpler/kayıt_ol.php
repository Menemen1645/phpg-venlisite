<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
?>

<?php
include 'data.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kullanici_adi = güvenli($_POST['kullanici_adi'], $veritabani);
    $parola = $_POST['parola'];
    $parola_tekrar = $_POST['parola_tekrar'];

    if ($parola === $parola_tekrar) {
        $tuz = bin2hex(random_bytes(32));
        $hashed_parola = hash('sha256', $parola . $tuz);

        $sorgu = $veritabani->prepare("INSERT INTO kullanicilar (kullanici_adi, sifre, tuz) VALUES (?, ?, ?)");
        $sorgu->bind_param("sss", $kullanici_adi, $hashed_parola, $tuz);
        if ($sorgu->execute()) {
            echo "Kayıt başarılı!";
        } else {
            echo "Hata: " . $sorgu->error;
        }

        $sorgu->close();
    } else {
        echo "Parolalar eşleşmiyor!";
    }
}

$veritabani->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt Ol</title>
    <style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: white;
    padding: 10px 0;
    text-align: center;
}

.menu a {
    color: white;
    text-decoration: none;
    margin: 0 15px;
}

.user-menu {
    float: right;
}

.user-menu a {
    color: white;
    text-decoration: none;
    margin-left: 15px;
}

.giris-formu, .kayıt-formu {
    max-width: 300px;
    margin: 50px auto;
    padding: 20px;
    background-color: white;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    border-radius: 10px;
    text-align: center;
}

.giris-formu h2, .kayıt-formu h2 {
    margin-bottom: 20px;
}

.giris-formu label, .kayıt-formu label {
    display: block;
    margin-bottom: 5px;
    text-align: left;
}

.giris-formu input[type="text"], .giris-formu input[type="password"],
.kayıt-formu input[type="text"], .kayıt-formu input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.giris-formu button, .kayıt-formu button {
    background-color: #333;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.giris-formu button:hover, .kayıt-formu button:hover {
    background-color: #555;
}
</style>
</head>
<body>
    <header>
        <div class="menu">
            <a href="index.php">Ana Sayfa</a>
        </div>
    </header>
    <main>
        <div class="kayıt-formu">
            <form method="post" action="kayıt_ol.php">
                <h2>Kayıt Ol</h2>
                <label for="kullanici_adi">Kullanıcı Adı:</label>
                <input type="text" id="kullanici_adi" name="kullanici_adi" required>
                <br>
                <label for="parola">Parola:</label>
                <input type="password" id="parola" name="parola" required>
                <br>
                <label for="parola_tekrar">Parola Tekrar:</label>
                <input type="password" id="parola_tekrar" name="parola_tekrar" required>
                <br>
                <button type="submit">Kayıt Ol</button>
            </form>
        </div>
    </main>
</body>
</html>
