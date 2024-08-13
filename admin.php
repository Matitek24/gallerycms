<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

session_start();
require 'vendor/autoload.php';

$secret_key = "majafalba";

// Sprawdzanie, czy JWT istnieje w sesji
$user_logged_in = false;
if (isset($_SESSION['jwt'])) {
    try {
        $jwt = $_SESSION['jwt'];
        $decoded = JWT::decode($jwt, new Key($secret_key, 'HS256'));

        if ($decoded->exp >= time()) {
            $user_logged_in = true;
        } else {
            unset($_SESSION['jwt']);
        }
    } catch (Exception $e) {
        unset($_SESSION['jwt']);
    }
}

if ($user_logged_in) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
    <link rel="stylesheet" href="./style/login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="login.php" method="POST">
        <h4 class="text-light">Zaloguj Się</h4>
        <label for="username">Login</label>
        <input type="text" placeholder="Email or Phone" id="username" class="rounded-3" name="username"> 

        <label for="password">Haslo</label>
        <input type="password" placeholder="Password" id="password" class="rounded-3" name="password">

        <button type="submit" class="mt-3 rounded-3">Zaloguj Się</button>
        <div class="social">
            <a href="resetuj.html" style="text-decoration: none;"><p class="fw-light"> Zresetuj Haslo</p></a>
        </div>
    </form>
</body>
</html>
