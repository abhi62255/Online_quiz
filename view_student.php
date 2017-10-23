<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$con=mysql_connect('localhost','root','');
	$i=mysql_select_db('online_quiz',$con);
	session_start();	
	$r=mysql_query("select * from login_details");
	echo "<table border='1'>";
	echo "<tr><th>Username</th><th>Password</th></tr>";
	while($row=mysql_fetch_array($r))
	{
		echo "<tr><td>".$row["username"]."</td>";
		echo "<td>".$row["password"]."</td></tr>";
	}
	echo "</table>";


?>
