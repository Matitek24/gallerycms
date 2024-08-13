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

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['photos'])) {
    $files = $_FILES['photos'];
    $response = ['success' => true, 'files' => []];

    // Iteracja przez każdy przesłany plik
    foreach ($files['name'] as $key => $filename) {
        // Sprawdzanie błędów przesyłania
        if ($files['error'][$key] === UPLOAD_ERR_OK) {
            $filename = basename($filename);
            $target = 'uploads/' . $filename;

            // Debugging: Sprawdzenie danych pliku
            error_log("File details: " . print_r($files, true));

            // Przeniesienie pliku do folderu uploads
            if (move_uploaded_file($files['tmp_name'][$key], $target)) {
                // Dodanie informacji o zdjęciu do bazy danych
                $stmt = $pdo->prepare('INSERT INTO photos (filename) VALUES (?)');
                $stmt->execute([$filename]);

                // Odczytanie ID zdjęcia
                $photo_id = $pdo->lastInsertId();

                // Dodanie szczegółów do odpowiedzi
                $response['files'][] = [
                    'filename' => $filename,
                    'id' => $photo_id
                ];
            } else {
                $response['success'] = false;
                $response['message'] = 'Nie udało się przesłać jednego z plików.';
                break;
            }
        } else {
            $response['success'] = false;
            $response['message'] = 'Błąd przesyłania jednego z plików. Kod błędu: ' . $files['error'][$key];
            break;
        }
    }

    echo json_encode($response);
} else {
    echo json_encode(['success' => false, 'message' => 'Nieprawidłowe żądanie.']);
}
?>
