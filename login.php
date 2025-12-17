<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/functions.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $u = trim($_POST["user"] ?? "");
    $p = trim($_POST["pass"] ?? "");

    if ($u === ADMIN_USER && $p === ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true; // фіксація у $_SESSION
        header("Location: admin.php");
        exit;
    } else {
        $error = "Невірний логін або пароль";
    }
}

$pageTitle = "Вхід адміністратора";
require_once __DIR__ . '/templates/header.php';
?>
<h1>Вхід адміністратора</h1>

<div class="box">
  <?php if ($error): ?>
    <p style="color:red;"><?php echo h($error); ?></p>
  <?php endif; ?>

  <form method="POST">
    <label>Логін:
      <input type="text" name="user" required>
    </label><br><br>
    <label>Пароль:
      <input type="password" name="pass" required>
    </label><br><br>
    <button type="submit">Увійти</button>
  </form>
</div>

<p class="muted">Логін/пароль змінюються в <b>includes/config.php</b></p>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
