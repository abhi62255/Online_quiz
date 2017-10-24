<?php
		include 'database.php';
		database();
?>	
	<form action="" method="post">
		<input type="number" name="test_id" placeholder="Test Id" />
		<input type="submit" name="submit" value="Clear" />
	</form>
<?php
	if(isset($_POST['submit']))
	{
	
		$test_id=$_POST['test_id'];
		echo "Test Id :".$test_id."<br /><br />";
		$r=mysql_query("delete from question where test_id=$test_id");
		if($r)
			$_SESSION['value']=1;
		header('Location: home.php');	
	}
		
?>