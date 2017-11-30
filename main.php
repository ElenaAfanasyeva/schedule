<?php
//відкриваю сесію
	session_start();
//підключаю бд
	include_once 'Rdb_connect.php';
//якщо була натиснута кнопа із імям btn-signup, то
if(isset($_POST['btn-signup']))
{

//перевіряю чи встановив юзер в інпуті значення логіна
	if(isset($_POST['login']))
	{

//присвоюю новим змінним дані введені юзером
		$login = $_POST['login'];
		$email = $_POST['email'];
		$bar = $_POST['bar'];
		$password = $_POST['pass'];
	}

//прибираю слеши із логіна
	$login = stripslashes($login);
//конвертую спец символи(типу апмерсантів...) логіна в html сущності
    $login = htmlspecialchars($login);
//видаляю пробіли з початку і кінця логіна
    $login = trim($login);
	
	$email = stripslashes($email);
    $email = htmlspecialchars($email);
    $email = trim($email);

	$bar = stripslashes($bar);
    $bar = htmlspecialchars($bar);
    $bar = trim($bar);

	$password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);

//за умови, що логін, емейл та ін. вставлені в таблицю, то виводжу скрипт про успіх
	if(mysql_query("INSERT INTO students(login,email,bar,pass) VALUES('$login', '$email', '$bar', '$password')"))
 {
?>
        <script>alert('successfully registered ');</script>
        <?php
 }
 else
 {
//за неуспішної вставки
  ?>
        <script>alert('error while registering you...');</script>
   <?php
 }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login & Registration System</title>
<link rel="stylesheet" href="log_in.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
<center>
<div id="main-wrapper">
<!-- форма для того аби залогінитись -->
<div id="login-form2">
<form method="post" action = "login.php">
<input type="text" name="login" placeholder="User Login" required />

<input type="password" name="pass" placeholder="Your Password" required />

<button type="submit" name="btn-signup1">LOG IN</button>

</form>
</div>

<!-- форма для реєстрації -->
<div id="login-form">
<form id="reg" method="post">
	<input type="text" name="login" placeholder="User Login" required />
	<input type="email" name="email" placeholder="Your Email" />
	<input type="text" name="bar" placeholder="Your Group" />
	<input type="password" name="pass" placeholder="Your Password" />
	<button type="submit" name="btn-signup">REGISTER</button>
</form>
</div>
</div>

<footer>Created by <a href="http://vk.com/id25389618">Elena Afanasyeva</a> and <a href="http://vk.com/id211349078">Linevich Olga</a></footer>
</center>
</body>
</html>
