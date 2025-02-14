<?
if(isset($_POST['email']) && is_string($_POST['email'])) {
    include('config.php');
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  $headers = "From: $email\r\nReply-to: $email\r\nContent-type:text/plain; charset=utf-8\r\n";
  $query = $connection->prepare("SELECT * FROM all_feedbacks WHERE email=:email");
  $query->bindParam(":email", $email, PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  if ($query->rowCount() > 0) {
    echo 'none';
  } if ($query->rowCount() == 0 && isset($_POST['formSubmit'])){
  $query = $connection->prepare("INSERT INTO all_feedbacks(name,email,phone,message) VALUES (:name,:email,:phone,:message)");
  $query->bindParam(":name", $name, PDO::PARAM_STR);
  $query->bindParam(":email", $email, PDO::PARAM_STR);
  $query->bindParam(":phone", $phone, PDO::PARAM_STR);
  $query->bindParam(":message", $message, PDO::PARAM_STR);
  $result = $query->execute();
  mail('kudruavcev@aisol.ru', 'Сообщение с формы', "Сообщение: $message", $headers);
  header('Location: index.php');
  }
}
    
?>
