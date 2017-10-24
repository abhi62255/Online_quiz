<?php
	include 'database.php';
	database();
?>

<form action="" method="post">
	<input type="number" name="test_id" placeholder="Test Id " /><br />
	<input type="submit" name="submit" value="delete" /><br />
</form>
<?php
	if(isset($_POST['submit']))
	{
		echo "hrllo";
		$test_id=$_POST['test_id'];
		$r=mysql_query("delete from login_details where test_id=$test_id");
		if($r)
			$_SESSION['value']=2;
		header('Location: home.php');
	}	
		
?>