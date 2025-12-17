<?php
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Дозволено лише POST-запити.");
}

$name  = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$q1    = trim($_POST["q1"] ?? "");
$q2    = trim($_POST["q2"] ?? "");
$q3    = trim($_POST["q3"] ?? "");

if ($name === "" || $email === "" || $q1 === "" || $q2 === "" || $q3 === "") {
    exit("Заповни всі поля.");
}

date_default_timezone_set("Europe/Kyiv");
$dt = date("Y-m-d H:i:s");

// Запис у БД
$stmt = db()->prepare("
  INSERT INTO responses (created_at, name, email, q1, q2, q3)
  VALUES (?, ?, ?, ?, ?, ?)
");
$stmt->execute([$dt, $name, $email, $q1, $q2, $q3]);

$pageTitle = "Відповідь прийнято";
require_once __DIR__ . '/templates/header.php';
?>
<h1>Відповідь прийнято ✅</h1>
<p>Дата і час заповнення: <b><?php echo h($dt); ?></b></p>
<p><a href="index.php">Повернутися до анкети</a></p>
<?php require_once __DIR__ . '/templates/footer.php'; ?>
