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

// Połączenie z bazą danych
$host = 'skrzypek24.mysql.dhosting.pl';
$db   = 'peec7a_testcms2';
$user = 'oe4hea_testcms2';
$pass = 'Testcms2';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Pobieranie zdjęć z bazy danych
$stmt = $pdo->query('SELECT id, filename FROM photos');
$photos = $stmt->fetchAll();

echo json_encode([
    'logged_in' => $user_logged_in,
    'photos' => $photos
]);
?>
