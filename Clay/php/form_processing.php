<?php
/* Осуществляем проверку вводимых данных и их защиту от враждебных 
скриптов */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$tel = htmlspecialchars($_POST["tel"]);
/* Устанавливаем e-mail адресата */
$myemail = "alinasapiannik@gmail.com";
/* Проверяем заполнены ли обязательные поля ввода, используя check_input 
функцию */
$name = check_input($_POST["name"], "Please enter your name!");
$tel = check_input($_POST["tel"], "Please enter your phone number!");
$email = check_input($_POST["email"], "Please enter your e-mail!");
/* Проверяем правильно ли записан e-mail */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Incorrect E-mail!");
}
/* Создаем новую переменную, присвоив ей значение */
$message_to_myemail = "Hello! 
You got 1 new application from contact form! 
Name: $name 
Phone number: $tel
E-mail: $email";
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n"; 
mail($myemail, "New application", $message_to_myemail, $from);
?>
<p>Thank you!</p>
<p>Return to  <a href="index.html">main >>></a></p>
<?php
/* Если при заполнении формы были допущены ошибки сработает 
следующий код: */
function check_input($data, $problem = "")
{
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
if ($problem && strlen($data) == 0)
{
show_error($problem);
}
return $data;
}
function show_error($myError)
{
?>
<html>
<body>
<p>Please correct this error:</p>
<?php echo $myError; ?>
</body>
</html>
<?php
exit();
}
?>