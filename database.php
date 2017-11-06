<?php
function database(){
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysql_connect('localhost','root','');
	mysql_select_db('online_quiz',$con);
 		 session_start();
}	
?>