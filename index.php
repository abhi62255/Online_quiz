<?php
	session_start();
	$_SESSION['question_no']=1;
	$_SESSION['value']=0;
	header('Location: home.php');

?>