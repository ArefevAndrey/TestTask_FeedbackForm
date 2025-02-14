
<!DOCTYPE html>
<html>
<head>
<title>Feedback Form</title>
</head>
<link rel="stylesheet" href="styles.css">
<script src="scripts.js"></script>
<body>
  <h2>Форма обратной связи</h2>
  <form action="formMailCompleted.php" method="POST">
  <fieldset>
  <legend>Оставьте сообщение:</legend>
  Ваше имя:
  <input type="text" class="check-label" name="name" placeholder="Имя" required>
  E-mail:
  <input type="email" id="emailInput" name="email" class="check-label" placeholder="gmail@gmail.com" required>
  Номер телефона:
  <input type="text" class="check-label" name="phone" maxLength="12" placeholder="88005553535" required onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
  Сообщение:
  <textarea rows="10" cols="45" class="check-label" name="message" minLength="1" maxLength="255" required></textarea>
  <input type="submit" id="emailCheckResult" class="check-label" name="formSubmit" value="Отправить сообщение">
  </fieldset>
  </form>
</body>
</html>




