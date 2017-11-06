<?php
	include'home.php';
	include'database.php';
	database();
?>
<form action="" method="post">
	<input type="number" name="test_id" placeholder="Test Id" /><br />
	<input type="text" name="subject" placeholder="Subject" /><br />
	<input type="number" name="marks_per_q" placeholder="Marks Per Question" /><br />
	<input type="number" name="negative_marks" placeholder="Negative Marks Per Wrong Question" /><br />
	<input type="time" name="time" placeholder="Test Timing" /><br />
	<input type="submit" name="submit" value="next" />
</form>
<?php
	if(isset($_POST['submit']))
	{
		$test_id=$_POST['test_id'];
		$subject=$_POST['subject'];
		$marks_per_q=$_POST['marks_per_q'];
		$negative_marks=$_POST['negative_marks'];
		$time=$_POST['time'];
		$r=mysql_query("insert into test_details values('$subject',$marks_per_q,$negative_marks,'$time',$test_id)");
		if($r){
			echo 'Tour Test Is Successfuly Created';
		}
		else
			echo "Your test Id is Not Unique";
		
	}

?>