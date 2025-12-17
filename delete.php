<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

require_once __DIR__ . '/includes/db.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Лише POST");
}

$id = (int)($_POST["id"] ?? 0);
if ($id <= 0) {
    exit("Некоректний ID");
}

$stmt = db()->prepare("DELETE FROM responses WHERE id = ?");
$stmt->execute([$id]);

header("Location: admin.php");
exit;
