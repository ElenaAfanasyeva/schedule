<?php
	//з’єднуюсь із бд (сервер ім’я_сервера пароль)
	if(!mysql_connect("localhost","root","1111"))
	{
		die('connection problems --> '.mysql_error());
	}
	/*else
	{
		echo('connect to server with bd!<br>');
	}
	*/
	//викликаю бд "schedule"
	if(!mysql_select_db("schedule"))
	{
		die('cant connect with db -->'.mysql_error());
	}
	/*else
	{
		echo('connect to _schedule_<br>');
	}
	*/
?>
