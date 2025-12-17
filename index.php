<?php
$pageTitle = "Анкета опитування";
require_once __DIR__ . '/templates/header.php';
?>
<h1>Опитування: Навчання</h1>

<div class="box">
  <form action="submit.php" method="POST">
    <label>Ім'я:
      <input type="text" name="name" required>
    </label><br><br>

    <label>Email:
      <input type="email" name="email" required>
    </label><br><br>

    <label>1) Скільки годин на день ти вчишся?
      <select name="q1" required>
        <option value="">--обери--</option>
        <option value="до 1 години">до 1 години</option>
        <option value="1-3 години">1-3 години</option>
        <option value="3-5 годин">3-5 годин</option>
        <option value="більше 5 годин">більше 5 годин</option>
      </select>
    </label><br><br>

    <div>2) Що допомагає найбільше?<br>
      <label><input type="radio" name="q2" value="відео" required> відео</label>
      <label><input type="radio" name="q2" value="конспект"> конспект</label>
      <label><input type="radio" name="q2" value="практика"> практика</label>
    </div><br>

    <label>3) Що найважче дається?
      <textarea name="q3" rows="3" required></textarea>
    </label><br><br>

    <button type="submit">Надіслати</button>
  </form>
</div>

<p class="muted">
  Адмін-панель: <a href="admin.php">admin.php</a>
</p>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
