<?php
session_start();
include_once 'Rdb_connect.php';

if(isset($_POST['btn-signup1']))
{

	$login = $_POST['login'];
	$password = $_POST['pass'];

	$result = mysql_query("SELECT * FROM students WHERE login='$login'");

	while($myrow = mysql_fetch_array($result))
		{
			if($myrow['pass'] == $password)
			{
				echo "you are registered";
				
				$_SESSION['id'] = $myrow['id']; 
				echo $_SESSION['id'];
				
				 header ('Location: addtask.php');  // перенаправление на нужную страницу
				 exit();
			}
		}
}
?>