<?php
	include('database.php');
	database();
	if(!isset($time_g)){
		date_default_timezone_set('Asia/Kolkata');
		 $hour = date('H');
		 $min = date('i');
		 $sec = date('s');
		 $time=$_SESSION['time'];
		 $a=explode(":",$time );
		 $hour1=$a[0];
		 $min1=$a[1];
		 $time_g=mktime($hour1,$min1,0,0,0,0)+mktime($hour,$min,$sec,0,0,0);
		
	 }
	$hour = date('H');
	$min = date('i');
	$sec = date('s');
	$now=mktime($hour,$min,$sec,0,0,0);
	if($now>$time_g){
		$_SESSION['value']=1;
		header('Location: finish.php');
	
	}	
	 echo $time_g."<br>";
	 echo $now."<br>";
	  
	 
	if(isset($_POST['next']))
	{
		$a=$_POST['a'];
		$_SESSION['question']=$_SESSION['question']+1;
		if(!isset($_POST['answer']))
		{
			//echo "noanswer given";
		}
		else{
			$answer=$_POST['answer'];
			$count=count($answer);
				for($i=0; $i<$count; $i++)
				{
					${"answer" . $i}=$answer[$i];
				}
				echo $_SESSION['negative_marks'];
			if($_SESSION['answer_count']==$count){
				//Answer count are matching
				if($count==1){
					if($answer0==$_SESSION['ans1']){
						$_SESSION['total_marks']=$_SESSION['total_marks']+$_SESSION['marks_per_q'];
						$_SESSION['correct_question']=$_SESSION['correct_question']+1;
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
					}
					else{
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
						$_SESSION['wrong_question']=$_SESSION['wrong_question']+1;
						$_SESSION['total_marks']=$_SESSION['total_marks']-$_SESSION['negative_marks'];
					}	
				}
				if($count==2){
					if($answer0==$_SESSION['ans1'] && $answer1==$_SESSION['ans2']){
						$_SESSION['total_marks']=$_SESSION['total_marks']+$_SESSION['marks_per_q'];
						$_SESSION['correct_question']=$_SESSION['correct_question']+1;
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
					}
					else{
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
						$_SESSION['wrong_question']=$_SESSION['wrong_question']+1;
						$_SESSION['total_marks']=$_SESSION['total_marks']-$_SESSION['negative_marks'];
					}	
				}
				if($count==3){
					if($answer0==$_SESSION['ans1'] && $answer1==$_SESSION['ans2'] && $answer2==$_SESSION['ans3']){
						$_SESSION['total_marks']=$_SESSION['total_marks']+$_SESSION['marks_per_q'];
						$_SESSION['correct_question']=$_SESSION['correct_question']+1;
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
					}
					else{
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
						$_SESSION['wrong_question']=$_SESSION['wrong_question']+1;
						$_SESSION['total_marks']=$_SESSION['total_marks']-$_SESSION['negative_marks'];
					}	
				}
				if($count==4){
					if($answer0==$_SESSION['ans1'] && $answer1==$_SESSION['ans2'] && $answer2==$_SESSION['ans3'] && $answer3==$_SESSION['ans4']){
						$_SESSION['total_marks']=$_SESSION['total_marks']+$_SESSION['marks_per_q'];
						$_SESSION['correct_question']=$_SESSION['correct_question']+1;
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
					}
					else{
						$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
						$_SESSION['wrong_question']=$_SESSION['wrong_question']+1;
						$_SESSION['total_marks']=$_SESSION['total_marks']-$_SESSION['negative_marks'];
					}	
				}
			}
			else{
				$_SESSION['attempted_question']=$_SESSION['attempted_question']+1;
				$_SESSION['wrong_question']=$_SESSION['wrong_question']+1;
				$_SESSION['total_marks']=$_SESSION['total_marks']-$_SESSION['negative_marks'];
			}
				
		}//checking answers
	}
	if(!isset($a))
	{
		$a=0;
	}
	$test_id=$_SESSION['test_id'];
	$r=mysql_query("select * from test_details where test_id=$test_id");
	while($row=mysql_fetch_array($r))
	{
		echo "Subject :".$row['subject']." <br />";
		echo "Marks Per Question :".$row['marks_per_q']." <br />";
		echo "Negative Marking Per Question :".$row['negative_marks']." <br />";
		echo "Time :".$row['time']." <br /><br />";
	}
	
	$sql1="select * from question where test_id=$test_id LIMIT 1 OFFSET $a";
	$result=mysql_query($sql1);
	echo "<form method='post' action=''>";
	while ($row = mysql_fetch_array($result))
	{
		echo"Q".$_SESSION['question']." ".$row['question']." <br /><br />";
					echo " <input type='checkbox' name='answer' value='a'>a) ".$row['option_a'].
					" <br /><input type='checkbox' name='answer[]' value='b'>b)".$row['option_b'].
					" <br /><input type='checkbox' name='answer[]' value='c'>c)  ".$row['option_c'].
					" <br /><input type='checkbox' name='answer[]' value='d'>d)  ".$row['option_d'].
					" <br /><br /><br /><br />";
					$_SESSION['answer_count']=$row['answer_count'];
					if($row['answer_count']==1){
						$_SESSION['ans1']=$row['answer_1'];
					}
					if($row['answer_count']==2){
						$_SESSION['ans1']=$row['answer_1'];
						$_SESSION['ans2']=$row['answer_2'];
					}
					if($row['answer_count']==3){
						$_SESSION['ans1']=$row['answer_1'];
						$_SESSION['ans2']=$row['answer_2'];
						$_SESSION['ans3']=$row['answer_3'];
					}
					if($row['answer_count']==4){
						$_SESSION['ans1']=$row['answer_1'];
						$_SESSION['ans2']=$row['answer_2'];
						$_SESSION['ans3']=$row['answer_3'];
						$_SESSION['ans4']=$row['answer_4'];
					}
					
	}
	$b=$a+1;
	echo "<input type='hidden' value='$b' name='a'>";
	echo "<input type='submit' name='next' value='next'> ";
	echo "<input type='reset' name='reset' value='Reset'>";
	echo "</form>";
	echo"<a href='finish.php'>FINISH</a>";
?>