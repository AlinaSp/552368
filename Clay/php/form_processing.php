<?php

$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$tel = htmlspecialchars($_POST["tel"]);

$myemail = "maksym.chvorda@gotoinc.co";

$name = check_input($_POST["name"], "Please enter your name!");
$tel = check_input($_POST["tel"], "Please enter your phone number!");
$email = check_input($_POST["email"], "Please enter your e-mail!");

if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
show_error("<br /> Incorrect E-mail!");
}

$message_to_myemail = "Hello! 
You got 1 new application from contact form! 
Name: $name 
Phone number: $tel
E-mail: $email";

$from  = "From: $name <$email> \r\n Reply-To: $email \r\n"; 

mail($myemail, "New application", $message_to_myemail, $from);

?>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
        background-color: #343C4A;
        color: #343C4A;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
      }

      div {
        width: 250px;
        height: 130px;
        padding: 20px;
        text-align: center;
        background-color: #fff;
        border-radius: 5px;
        border: 1px solid transparent;
        box-shadow: 0px 4px 28px rgba(6, 6, 90, 0.06);
      }

      h2 {
        font-size: 28px;
      }

      a {
        padding: 10px 20px;
        border: 2px solid #00D053;
        border-radius: 5px;
        color: #00D053;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
      }
    </style>
  </head>
  <body>
    <div>
      <h2>Thank you!</h2>
      <a href="../index.html">Return back</a>
    </div>
  </body>
</html>


<?php

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
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
      body {
        background-color: #343C4A;
        color: #343C4A;
        display: flex;
        justify-content: center;
        align-items: center;
        font-family: sans-serif;
      }

      div {
        width: 250px;
        height: 250px;
        padding: 20px;
        text-align: center;
        background-color: #fff;
        border-radius: 5px;
        border: 1px solid transparent;
        box-shadow: 0px 4px 28px rgba(6, 6, 90, 0.06);
        display: flex;
        flex-direction: column;
      }

      h2 {
        font-size: 28px;
      }

      a {
        padding: 10px 20px;
        border: 2px solid #00D053;
        border-radius: 5px;
        color: #00D053;
        font-weight: bold;
        text-transform: uppercase;
        text-decoration: none;
        margin-top: 50px;
      }
    </style>
  </head>
  <body>
    <div>
      <h2>Please correct this error:</h2>
      <span><?php echo $myError; ?></span>
      <a href="../index.html">Return back</a>
    </div>
  </body>
</html>
<?php
exit();
}
?>