<?php
	echo "Hello";
	session_start();
	include_once 'Rdb_connect.php';
	$task = mysql_real_escape_string($_POST['task']);
	$day = mysql_real_escape_string($_POST['day']);

	$id_of_page = $_SESSION['id'];

	if(mysql_query("INSERT INTO tasks(user_id, day,task) VALUES('$id_of_page', '$day','$task')"))
 	{

 ?>
        <script>alert('successfully added ');</script>
		
        <?php
 header ('Location: tasks.php');  // перенаправление на нужную страницу
				 exit();
	}
	 else
 	{
?>
        <script>alert('error while adding you...');</script>
        <?php
 	}	
	
?>