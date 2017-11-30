<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Your cabinet</title>
	<link rel="stylesheet" href="StylesForRozklad.css">
	<!--<style>
		body {background: blue;}
		table, td {border: 1px solid yellow;}
		th {background: green;}
		form {background: brown;}

		#tasks { 
					margin-left: 700px;
					margin-top: -200px;
				}
		#schedule {  }
				
	</style>-->
</head>

<body>
<center>
<div id = "schedule">
<?php

//вікдриваю сесію	
	session_start();

//підключаюсь до бд
	include_once 'Rdb_connect.php';

//зберігаю id теперішнього користувача
	$id_of_page = $_SESSION['id'];

//витягую групу, розклад якої хочу отримати користувач
	$result = mysql_query("SELECT bar FROM students WHERE id = '$id_of_page'");

	if($myrow = mysql_fetch_array($result))
	{
//зберігаю групу в змінну
		$bar = $myrow['bar'];
		echo $bar ."<br>";

//створено масив днів тижня для подальшого їх виведення на екран
		$days  = "monday tuesday wednesday thirsday friday saturday sunday";
//встановдюю, що розділяє значення масива - пробіл
		$day = explode(" ", $days);
//створюю таблицю
		echo "<table border='1' width='50%' cellspacing='0' cellpadding='4'>";
		for ($x=0; $x<7; $x++) 
		{	
   			echo "<tr>";
   			echo "<td>";
   			echo "<th>";

//забиваю таблицю днями
			echo $day[$x]." ";
   			echo "<th>";

//витягую із таблиці schelule1 розклад певної группи по дням
			$query = mysql_query("SELECT * FROM schedule1 WHERE day = '$day[$x]' AND bar = '$bar'");
			while($myrow4 = mysql_fetch_array($query))				
			{
//вивід в таблицю пари
		    	echo "<td>". $myrow4["lesson"]. "<br> 00.00</td>";
	    	}

   			echo "</td>";

			echo "</tr>";
		}
 			
			echo "</table>";

}
?>
</div>

	<div id="tasks">
<!-- форма для додавання завдання, його оновлення і видалення-->
	<form method="post" action = "addtask.php">
		<div ng-app = "">
		<input type="text" ng-model = "task" name="task" placeholder="put the task" required />
		<span ng-bind = "task"></span>
		</div>
		<script src = "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

		<select name = "day">
    <option disabled>Sunday</option>
    <option value="monday">Monday</option>
    <option value="tuesday">Tuesday</option>
    <option value="wednesday">Wednsday</option>
    <option value="thirsday">Thirsday</option>
    <option value="friday">Friday</option>
    <option value="saturday">Saturday</option>
    <option value="sunday">Sunday</option>
   </select>

		<button type="submit" name="add_task">add task</button>
	</form>

		<form method="post" action = "info.php">
		<input type="text" name="number" placeholder="put num to delete" required />
		<button type="submit" name="delete_task">delete task</button>
		</form>

		<form method = "post" action = "info.php">
			<input type="text" name="number1" placeholder="put num to update" required />
			<input type="text" name="new_task" placeholder="put new task to rewrite update" required />
			<button type="submit" name = "update_task">update task</button> 

		</form>
<?php

    function makeTextInputField($name, $idd) {
        $text = ucfirst($name);
		$id1 = ucfirst($idd);
        echo "

            <input type='checkbox' name='{$name}' value='{$id1}'/>
        ";
    }
	
?>

<!-- форма для видалення завдання-->
<form method = "POST" action = "info.php">
<?php
	session_start();
	include_once 'Rdb_connect.php';

	$id_of_page = $_SESSION['id'];

	$result = mysql_query("SELECT * FROM tasks WHERE user_id = '$id_of_page'");

	while($myrow = mysql_fetch_array($result))
		{
			$count = $count+1;
//створюю інпут, куди виведу задачу і її чекбокс
			makeTextInputField('number',$myrow['id']); 
			echo $count. " ";
			echo $myrow['id']. " " .$myrow['task']."<br>";	
			

		}
?>
<br>
	<button type="submit" name = "delete_task">delete task</button> 
	</form>

</div>
</center>

</body>
</html>