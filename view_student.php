<?php
	include 'database.php';
	database();	
	$r=mysql_query("select * from login_details");
	echo "<table border='1'>";
	echo "<tr><th>Test Id</th><th>Username</th><th>Password</th></tr>";
	while($row=mysql_fetch_array($r))
	{
		echo "<tr><td>".$row["test_id"]."</td>";
		echo "<td>".$row["username"]."</td>";
		echo "<td>".$row["password"]."</td></tr>";
	}
	echo "</table>";


?>
