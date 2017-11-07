<?php
	include 'database.php';
	$test_id=$_POST['test_id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$usernamep=$_POST['usernamep'];

		$p=mysql_query("update login_details set username='$username', password='$password', test_id=$test_id where username='$usernamep'");
		if($p)
			$_SESSION['value']=1;
		else
			$_SESSION['value']=2;
		
		header('Location: update_student.php');
?>