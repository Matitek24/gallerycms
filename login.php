<?php
session_start();
require 'vendor/autoload.php'; // Autoload dla Composer
use \Firebase\JWT\JWT;

$secret_key = "majafalba"; // Użyj klucza tajemniczego do podpisywania JWT
$login = "admin";
$password = "admin";

// Sprawdzenie, czy dane zostały przesłane
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input_login = $_POST['username'];
    $input_password = $_POST['password'];

    // Prosta walidacja danych logowania
    if ($input_login === $login && $input_password === $password) {
        // Jeśli dane są poprawne, generujemy token JWT
        $payload = [
            "iss" => "http://testcms.dfirma.pl",
            "aud" => "http://testcms.dfirma.pl",
            "iat" => time(),
            "nbf" => time(),
            "exp" => time() + (60 * 60), // Token wygasa po 1 godzinie
            "data" => [
                "username" => $login
            ]
        ];

        $jwt = JWT::encode($payload, $secret_key, 'HS256');

        // Zapisz token w sesji
        $_SESSION['jwt'] = $jwt;

        // Przekierowanie do strony głównej
        header('Location: index.php');
        exit;
    } else {
        // Błędne dane logowania, przekierowanie do strony logowania
        header('Location: admin.html?error=1');
        exit;
    }
} else {
    // Jeśli nie POST, przekierowanie do formularza logowania
    header('Location: admin.php');
    exit;
}
