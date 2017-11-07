<?php
		include'home.php';
		include 'database.php';
		$id=$_POST['id'];
		echo $id;
		mysql_query("delete from question where id=$id");
		$_SESSION['question_no']=1;
		header('Location: update_test.php');
		
		
?>