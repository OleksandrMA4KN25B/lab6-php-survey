<!DOCTYPE html>
<html lang="uk">
<head>
  <meta charset="UTF-8">
  <title>Анкета опитування</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .box {
      width: 400px;
      padding: 15px;
      border: 1px solid #000;
    }
    label { display: block; margin-top: 10px; }
    button { margin-top: 15px; }
  </style>
</head>
<body>

<h1>Опитування: Навчання</h1>

<div class="box">
  <form action="submit.php" method="POST">

    <label>
      Ім'я:
      <input type="text" name="name" required>
    </label>

    <label>
      Email:
      <input type="email" name="email" required>
    </label>

    <label>
      1) Скільки годин на день ти вчишся?
      <select name="q1" required>
        <option value="">--обери--</option>
        <option value="до 1 години">до 1 години</option>
        <option value="1-3 години">1-3 години</option>
        <option value="3-5 годин">3-5 годин</option>
        <option value="більше 5 годин">більше 5 годин</option>
      </select>
    </label>

    <label>
      2) Що допомагає найбільше?
      <input type="radio" name="q2" value="відео" required> відео
      <input type="radio" name="q2" value="конспект"> конспект
      <input type="radio" name="q2" value="практика"> практика
    </label>

    <label>
      3) Що найважче дається?
      <textarea name="q3" rows="3" required></textarea>
    </label>

    <button type="submit">Надіслати</button>

  </form>
</div>

</body>
</html>
