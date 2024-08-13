<?php
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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (isset($data['id'])) {
        $id = $data['id'];

        // Pobierz nazwę pliku z bazy danych
        $stmt = $pdo->prepare('SELECT filename FROM photos WHERE id = ?');
        $stmt->execute([$id]);
        $photo = $stmt->fetch();

        if ($photo) {
            $filename = $photo['filename'];

            // Usuń plik z serwera
            $filePath = 'uploads/' . $filename;
            if (file_exists($filePath)) {
                unlink($filePath);
            }

            // Usuń rekord z bazy danych
            $stmt = $pdo->prepare('DELETE FROM photos WHERE id = ?');
            $stmt->execute([$id]);

            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Nie znaleziono zdjęcia.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Brak identyfikatora zdjęcia.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Nieprawidłowe żądanie.']);
}
?>
