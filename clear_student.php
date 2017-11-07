<?php
	include 'database.php';
	include 'home.php';
	if($_SESSION['value']==2)
		echo "Student Cleared <br />";
	$_SESSION['value']=0;

?>

<form action="" method="post">
	<input type="number" name="test_id" placeholder="Test Id " required/><br />
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
		header('Location: clear_student.php');
	}	
		
?>