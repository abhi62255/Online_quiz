<?php
	include 'database.php';
	database();	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$usernamep=$_POST['usernamep'];

		$p=mysql_query("update login_details set username='$username', password='$password' where username='$usernamep'");
		if($p)
			$_SESSION['value']=1;
		else
			$_SESSION['value']=2;
		
		header('Location: update_student.php');
?>