<?php
	include'home.php';
	include 'database.php';

?>
<html>
<head>
<title>Test</title>
</head>

<body>
	<form action="" method="post">
		<input type="number" name="test_id" placeholder=" Test Id"><br /><br />
		<textarea rows="5" cols="100" maxlength="1000" name="question" placeholder="Question" ></textarea><br /><br />
		<input type="text" name="option_a" placeholder="Option (A)"  />
		<input type="text" name="option_b" placeholder="Option (B)"  />
		<input type="text" name="option_c" placeholder="Option (C)"  />
		<input type="text" name="option_d" placeholder="Option (D)"  /><br /><br />
		Answers &nbsp;
		a)<input type="checkbox" name="answer[]" value="a"/>&nbsp;
		b)<input type="checkbox" name="answer[]" value="b"/>&nbsp;
		c)<input type="checkbox" name="answer[]" value="c"/>&nbsp;
		d)<input type="checkbox" name="answer[]" value="d"/><br /><br />
		<input type="reset"  />
		<input type="submit" name="next" value="Next" />
	</form>
	<button onClick="location='home.php'">Finish</button>
	
</body>
</html>
<?php
	if(isset($_POST['next']))
	{
		$test_id=$_POST['test_id'];
		$id=$_SESSION['question_no'];
		$question=$_POST['question'];
		$option_a=$_POST['option_a'];
		$option_b=$_POST['option_b'];
		$option_c=$_POST['option_c'];
		$option_d=$_POST['option_d'];
		$answer=$_POST['answer'];
		$count=count($answer);
			for($i=0; $i<$count; $i++)
			{
				${"answer" . $i}=$answer[$i];
			}
		if($count==1)
		{	
			$count=$count;
			$r=mysql_query("insert into question (id,question,option_a,option_b,option_c,option_d,answer_1,answer_count,test_id) values($id,'$question','$option_a','$option_b','$option_c','$option_d','$answer0',$count,$test_id)");
			if($r){
				$_SESSION['question_no']=$_SESSION['question_no']+1;
				echo "Inserted";
			}
		}
		if($count==2)
		{	
			$count=$count;
			$r=mysql_query("insert into question (id,question,option_a,option_b,option_c,option_d,answer_1,answer_2,answer_count,test_id) values($id,'$question','$option_a','$option_b','$option_c','$option_d','$answer0','$answer1',$count,$test_id)");
			if($r){
				$_SESSION['question_no']=$_SESSION['question_no']+1;
				echo "Inserted";
			}
		}
		if($count==3)
		{	
			$count=$count;
			$r=mysql_query("insert into question (id,question,option_a,option_b,option_c,option_d,answer_1,answer_2,answer_3,answer_count,test_id) values($id,'$question','$option_a','$option_b','$option_c','$option_d','$answer0','$answer1','$answer2',$count,$test_id)");
			if($r){
				$_SESSION['question_no']=$_SESSION['question_no']+1;
				echo "Inserted";
			}
		}
		if($count==4)
		{	
			$count=$count;
			$r=mysql_query("insert into question (id,question,option_a,option_b,option_c,option_d,answer_1,answer_2,answer_3,answer_4,answer_count,test_id) values($id,'$question','$option_a','$option_b','$option_c','$option_d','$answer0','$answer1','$answer2','$answer3',$count,$test_id)");
			if($r){
				$_SESSION['question_no']=$_SESSION['question_no']+1;
				echo "Inserted";
			}
		}
	
	}
	
?>