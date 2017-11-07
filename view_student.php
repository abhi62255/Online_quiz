<?php
	include 'database.php';
	include'home.php';
?>
<form action="" method="post">
		<input type="number" name="test_id" placeholder="Test Id" />
		<input type="submit" name="submit" value="Find" />
	</form>
<?php
	if(isset($_POST['submit']))
	{
		$test_id=$_POST['test_id'];
		$r=mysql_query("select * from login_details where test_id=$test_id");
		echo "<table border='1'>";
		echo "<tr><th>Test Id</th><th>Username</th><th>Password</th></tr>";
		while($row=mysql_fetch_array($r))
		{
			echo "<tr><td>".$row["test_id"]."</td>";
			echo "<td>".$row["username"]."</td>";
			echo "<td>".$row["password"]."</td></tr>";
		}
		echo "</table>";
	}

?>
