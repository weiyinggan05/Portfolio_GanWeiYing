<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

function respond(bool $success, string $message, int $status = 200): never {
    http_response_code($status);
    echo json_encode(['success' => $success, 'message' => $message], JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(false, 'Only POST requests are allowed.', 405);
}

// Hidden honeypot field. Bots often fill it in.
if (!empty($_POST['website'] ?? '')) {
    respond(true, 'Thank you. Your message has been received.');
}

$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$length = static fn(string $value): int => function_exists('mb_strlen') ? mb_strlen($value, 'UTF-8') : strlen($value);

if ($name === '' || $length($name) > 80) {
    respond(false, 'Please enter a valid name.', 422);
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL) || $length($email) > 120) {
    respond(false, 'Please enter a valid email address.', 422);
}
if ($message === '' || $length($message) > 1500) {
    respond(false, 'Please enter a message with fewer than 1,500 characters.', 422);
}

// Prevent spreadsheet formula injection when opening the CSV file.
$cleanCell = static function (string $value): string {
    $value = preg_replace('/[\x00-\x1F\x7F]/u', ' ', $value) ?? $value;
    if (preg_match('/^[=+\-@]/', $value)) {
        $value = "'" . $value;
    }
    return $value;
};

$dataDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'data';
$dataFile = $dataDirectory . DIRECTORY_SEPARATOR . 'messages.csv';
if (!is_dir($dataDirectory) && !mkdir($dataDirectory, 0755, true) && !is_dir($dataDirectory)) {
    respond(false, 'The message folder could not be created.', 500);
}

$file = fopen($dataFile, 'ab');
if ($file === false) {
    respond(false, 'The message could not be saved.', 500);
}

if (flock($file, LOCK_EX)) {
    fputcsv($file, [date('Y-m-d H:i:s'), $cleanCell($name), $cleanCell($email), $cleanCell($message)]);
    fflush($file);
    flock($file, LOCK_UN);
    fclose($file);
    respond(true, 'Message saved successfully. Thank you for reaching out!');
}

fclose($file);
respond(false, 'The message file is temporarily unavailable.', 500);
