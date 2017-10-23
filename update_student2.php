<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysql_connect('localhost','root','');
	$i=mysql_select_db('online_quiz',$con);
	session_start();
	$username=$_POST['username'];
	$r=mysql_query("delete from login_details where username='$username'");	
	if($r)
		$_SESSION['value']=2;
	header('Location: update_student.php');
?>