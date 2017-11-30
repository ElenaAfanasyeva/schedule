<?php
	session_start();
	include_once 'Rdb_connect.php';

//якщо натиснута кнопа delete_task, то...
	if(isset($_POST['delete_task']))
	{
//ця mysql_real_escape_string функція екранує символи
//робить придатним для використання у sql запросах строку
		$id = mysql_real_escape_string($_POST['number']);
		$row = "DELETE FROM tasks WHERE id = '$id'";
		mysql_query($row);
//повертаюсь на минулу сторіночку
        header ('Location: tasks.php');  
        exit();
	
	}

	if(isset($_POST['update_task']))
	{echo "put";
		$id = mysql_real_escape_string($_POST['number1']);
		$task = mysql_real_escape_string($_POST['new_task']);
		$row2 = "UPDATE tasks SET task = '$task' WHERE id = '$id'";

		mysql_query($row2);
		header ('Location: tasks.php');  
		exit();	
	}

?>
