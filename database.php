<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysql_connect('localhost','root','');
	mysql_select_db('online_quiz',$con);
	if(!isset($_SESSION))
		session_start();
?>