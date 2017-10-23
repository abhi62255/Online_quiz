<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysql_connect('localhost','root','');
	$i=mysql_select_db('online_quiz',$con);
	session_start();
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