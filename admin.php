<?php
require_once __DIR__ . '/includes/auth.php';
require_login();

require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/functions.php';

$rows = db()->query("SELECT * FROM responses ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = "Адмін-панель";
require_once __DIR__ . '/templates/header.php';
?>
<h1>Адмін-панель</h1>

<div class="row">
  <a href="export.php">📤 Експорт (CSV)</a>
  <span>|</span>
  <a href="logout.php">🚪 Вийти</a>
</div>
<br>

<?php if (!$rows): ?>
  <p>Поки немає відповідей.</p>
<?php else: ?>
  <table>
    <tr>
      <th>ID</th>
      <th>Дата/час</th>
      <th>Ім'я</th>
      <th>Email</th>
      <th>Відповіді</th>
      <th>Дія</th>
    </tr>
    <?php foreach ($rows as $r): ?>
      <tr>
        <td><?php echo (int)$r['id']; ?></td>
        <td><?php echo h($r['created_at']); ?></td>
        <td><?php echo h($r['name']); ?></td>
        <td><?php echo h($r['email']); ?></td>
        <td>
          <div><b>Q1:</b> <?php echo h($r['q1']); ?></div>
          <div><b>Q2:</b> <?php echo h($r['q2']); ?></div>
          <div><b>Q3:</b> <?php echo nl2br(h($r['q3'])); ?></div>
        </td>
        <td>
          <form method="POST" action="delete.php" onsubmit="return confirm('Видалити запис?');">
            <input type="hidden" name="id" value="<?php echo (int)$r['id']; ?>">
            <button type="submit">🗑 Видалити</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
<?php endif; ?>

<?php require_once __DIR__ . '/templates/footer.php'; ?>
