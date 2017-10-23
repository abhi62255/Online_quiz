<?php
	include 'database.php';
	database();	
	if($_SESSION['value']==1){
		echo "Inserted <br />";
		$_SESSION['value']=0;
	}
	
	
	$question=1;
	$r=mysql_query("select * from question");
	while($row=mysql_fetch_array($r))
	{
		echo"Q".$question." ".$row['question']." <br /><br />";
		echo "a) ".$row['option_a']." b) ".$row['option_b']." c) ".$row['option_c']." d) ".$row['option_d']." <br />";
		echo "Answer :".$row['answer_1']." ".$row['answer_2']." ".$row['answer_3']." ".$row['answer_4']."<br /><br /><br />";
		$question=$question+1;
?>
	<form action="update_test1.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
		<input type="submit" name="submit" value="Update" />
	</form>
	
	<form action="update_test3.php" method="post">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
		<input type="submit" name="submit" value="delete" />
	</form>
<?php	
	}
?>