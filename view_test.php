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
	}
?>