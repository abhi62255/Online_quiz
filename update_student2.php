<?php
	include 'database.php';
	database();	
	$username=$_POST['username'];
	$r=mysql_query("delete from login_details where username='$username'");	
	if($r)
		$_SESSION['value']=2;
	header('Location: update_student.php');
?>