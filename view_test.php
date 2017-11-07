<?php
	include 'database.php';
	include'home.php';
	if($_SESSION['value']==1){
		echo "Inserted <br />";
		$_SESSION['value']=0;
	}
?>	
	<form action="" method="post">
		<input type="number" name="test_id" placeholder="Test Id" />
		<input type="submit" name="submit" value="Find" />
	</form>
<?php
	if(isset($_POST['submit']))
	{
	
		$question=1;
		$test_id=$_POST['test_id'];
		echo "Test Id :".$test_id."<br />";
		$r1=mysql_query("select * from test_details where test_id=$test_id");
		if(mysql_num_rows($r1)==0)
			echo"No Such Test Exist";
		else{
				while($row=mysql_fetch_array($r1))
				{
					echo "Subject :".$row['subject']." <br />";
					echo "Marks Per Question :".$row['marks_per_q']." <br />";
					echo "Negative Marking Per Question :".$row['negative_marks']." <br />";
					echo "Time :".$row['time']." <br /><br />";
				}
			}
				$r=mysql_query("select * from question where test_id=$test_id");
				while($row=mysql_fetch_array($r))
				{
					echo"Q".$question." ".$row['question']." <br /><br />";
					echo "a) ".$row['option_a']." b) ".$row['option_b']." c) ".$row['option_c']." d) ".$row['option_d']." <br />";
					echo "Answer :".$row['answer_1']." ".$row['answer_2']." ".$row['answer_3']." ".$row['answer_4']."<br /><br /><br />";
					$question=$question+1;
				}
	}
?>