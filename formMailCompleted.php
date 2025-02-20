<?
function BackEndValidationName($data){
  $err=""; 
    if(strlen($data)<1 || strlen($data)>20)
        $err = "Длина имени должна быть от 1 до 20 символов"; 
    if (!preg_match('/[а-яА-ЯёЁ]/',$data))
        $err = $err . "Имя должно быть на кириллице";
    if(!empty($err))
        return($err);
    else
        return 0;
}
function BackEndValidationEmail($data){
  $err ="";
  if(strlen($data)<3 || strlen($data)>50)
      $err = "Email должен быть от 3 до 50 символов'"; 
  if (!filter_var($data, FILTER_VALIDATE_EMAIL))
     $err = $err . "Не правильный формат email. Пример: gmail@gmail.com";  
  if(!empty($err))
      return($err);
  else
      return 0;
}

function BackEndValidationPhone($data){
  $err ="";
  if(strlen($data)<1 || strlen($data)>12)
    $err = "Номер телефона должен состоять из 11 цифр!";
  if (!filter_var($data, FILTER_VALIDATE_INT))
    $err = $err . "Номер должен состоять из цифр.";
  if(!empty($err))
    return($err);
  else
    return 0;
}

function BackEndValidationMessage($data){
  $err ="";
  if(strlen($data)<1 || strlen($data)>255)
    $err = "Сообщение должно состоять от 1 до 255 символов";
  if (!preg_match("/^(?!.*\.{2,}.*$)[A-Za-zА-яЁё0-9.,!?]+$/",$data))
    $err = $err . "Попытка отправки пробела(пустой строки) / недопустимых символов"; 
  if(!empty($err))
    return($err);
else
    return 0;
}

function BackEndValidationFeedbackForm($data_name, $data_email, $data_phone, $data_message){
  $err="";
  $err_name = BackEndValidationName($data_name);
  $err_email = BackEndValidationEmail($data_email);
  $err_phone = BackEndValidationPhone($data_phone);
  $err_message = BackEndValidationMessage($data_message);
  if(!empty($err_name))
    $err = $err_name;
  if(!empty($err_email))
    $err = $err . $err_email;
  if(!empty($err_phone))
    $err = $err . $err_phone;
  if(!empty($err_message))
    $err = $err . $err_message;
  return $err;
}

  if(isset($_POST['email']) && is_string($_POST['email'])) {
    include('config.php');
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $message = $_POST['message'];
  $headers = "From: $email\r\nContent-type:text/plain; charset=utf-8\r\n";
  $query = $connection->prepare("SELECT * FROM all_feedbacks WHERE email=:email");
  $query->bindParam(":email", $email, PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch(PDO::FETCH_ASSOC);
  if ($query->rowCount() > 0) {
    echo 'none';
} if ($query->rowCount() == 0 && isset($_POST['formSubmit'])){
$error_form = BackEndValidationFeedbackForm($name, $email, $phone, $message);
if(!empty($error_form)){ 
    echo $error_form;
}
else{ 
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
  }
?>
