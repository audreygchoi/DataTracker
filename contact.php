<!DOCTYPE html>

<html>
<head>
<meta charset="UTF-8">

<title>Audrey Grace Choi</title>
</head>
<body>
<?php
$name = $_GET['name'];
$email = $_GET['email'];
$message = $_GET['message'];

mail("agc3sz@virginia.edu","Message from $email",$message);
echo "Thank You $name for your message!";
?>


</body>
</html>

