<?php
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: SAMEORIGIN');
header('X-XSS-Protection: 1; mode=block');
?>

<?php

include 'data.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kullanici_adi = güvenli($_POST['kullanici_adi'], $veritabani);
    $parola = $_POST['parola'];

    $sorgu = $veritabani->prepare("SELECT sifre, tuz FROM kullanicilar WHERE kullanici_adi = ?");
    $sorgu->bind_param("s", $kullanici_adi);
    $sorgu->execute();
    $sorgu->bind_result($sifre_db, $tuz);
    $sorgu->fetch();

    if (hash('sha256', $parola . $tuz) === $sifre_db) {
        $_SESSION['kullanici_adi'] = $kullanici_adi;
        $_SESSION['loggedin'] = true;
        header("Location: index.php");
        exit();
    } else {
        echo "Kullanıcı adı veya parola yanlış!";
    }

    $sorgu->close();
}

$veritabani->close();
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <style>
        body {
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

        .giris-formu {
            max-width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
        }

        .giris-formu h2 {
            margin-bottom: 20px;
        }

        .giris-formu label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }

        .giris-formu input[type="text"],
        .giris-formu input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .giris-formu button {
            background-color: #333;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .giris-formu button:hover {
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
        <div class="giris-formu">
            <form method="post" action="kullanici_girisi.php">
                <h2>Giriş Yap</h2>
                <label for="kullanici_adi">Kullanıcı Adı:</label>
                <input type="text" id="kullanici_adi" name="kullanici_adi" required>
                <br>
                <label for="parola">Parola:</label>
                <input type="password" id="parola" name="parola" required>
                <br>
                <button type="submit">Giriş Yap</button>
            </form>
        </div>
    </main>
</body>
</html>
