
<!DOCTYPE html>
<html>
<head>
<title>Feedback Form</title>
</head>
<meta charset="UTF-8">
<link rel="stylesheet" href="styles.css">
<script src="scripts.js"></script>
<body>
  <h2>Форма обратной связи</h2>
  <form action="formMailCompleted.php" method="POST">
  <fieldset>
  <legend>Оставьте сообщение:</legend>
  <span>Ваше имя:</span>
  <input type="text" class="check-label" name="name" maxLength="20" id="nameForm" placeholder="Имя" onkeypress="return NameValidation(event)" required>
  <span>E-mail:</span>
  <input type="email" id="emailInput" name="email" class="check-label" id="emailForm" placeholder="gmail@gmail.com" onkeypress="return EmailValidation(event)" required>
  <span>Номер телефона:</span>
  <input type="text" class="check-label" name="phone" maxLength="12" id="numberForm"  placeholder="88005553535" onkeypress="return PhoneValidation(event)" required />
  <span>Сообщение:</span>
  <textarea rows="10" cols="45" class="check-label" name="message" id="messageForm" maxLength="255" onkeypress="return MessageValidation(event)" required></textarea><br>
  <input type="submit" id="emailCheckResult" class="check-label" name="formSubmit" value="Отправить сообщение">
  </fieldset>
  </form>
</body>
</html>
