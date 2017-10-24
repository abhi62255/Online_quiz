<?php
	include 'database.php';
	database();	
	if($_SESSION['value']==1){
		echo "Updated";
		$_SESSION['value']=0;
	}
	if($_SESSION['value']==2){
		echo "Student deleted";
		$_SESSION['value']=0;
	}
	$r=mysql_query("select * from login_details");
	echo "<table border='1'>";
	echo "<tr><th>Test Id</th><th>Username</th><th>Password</th><th>Action</th></tr>";
	while($row=mysql_fetch_array($r))
	{
		echo "<tr><td>".$row["test_id"]."</td>";
		echo "<td>".$row["username"]."</td>";
		echo "<td>".$row["password"]."</td>";
?>		<td>
		<form action=""; method="post">
			<input type="hidden" name="usernamep" value="<?php echo $row['username']?>" />
			<input type="submit" name="submit" value="update" />
		</form>
		</td>
		<td>
		<form action="update_student2.php" method="post">
			<input type="hidden" name="username" value="<?php echo $row['username']?>" />
			<input type="submit" name="submit" value="delete" />
		</form>
		</td></tr>
<?php
	}
	echo "</table>";
if(isset($_POST['submit']))
{
?>
	<form action="update_student1.php" method="post">
			<input type="hidden" name="usernamep" value="<?php echo $_POST['usernamep']?>" />
			Test Id <input type="number" name="test_id" /><br />
			Name <input type="text" name="username" /><br />
			Password <input type="password" name="password" /><br />
			<input type="submit" name="submit" value="Add" /><br />
	</form>
<?php
}
?>
