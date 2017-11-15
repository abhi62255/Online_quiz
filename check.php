<?php
	include('database.php');
	function time1(){
				if(!isset($_SESSION['time_g'])){
					$_SESSION['time_g']=time();
				 }
				 $a=explode(":",$_SESSION['time']);
				 $sec=$a[0]*3600+$a[1]*60;
				$now=time();
				if(time()-$_SESSION['time_g']>$sec){
					$_SESSION['value']=1;
					unset($_SESSION['time_g']);
					header('Location: finish.php');
				}	
				echo "<div style='background-color:#00FFFF;'><table border='0' cellpadding='14px'>";
				echo "<tr><th>Given Time :</th><td>".gmdate("H:i:s", $sec)."</td>";
				echo "<th>Time Remaning :</th><td>".gmdate("H:i:s", $sec-(time()-$_SESSION['time_g']))."</td>";			 
	}
	time1();
	 
	if(isset($_POST['next']))
	{
		unset($_POST['next']);
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
		echo "<th>Subject :</th><td>".$row['subject']." </td>";
		echo "<th>Marks Per Question :</th><td>".$row['marks_per_q']."</td>";
		echo "<th>Negative Marking Per Question :</th><td>".$row['negative_marks']."</td>";
		echo "<th>Time :</th><td>".$row['time']." hr</td></tr>";
	}
	echo "</table></div>";
	
	$sql1="select * from question where test_id=$test_id LIMIT 1 OFFSET $a";
	$result=mysql_query($sql1);
	echo "<div style='background-color:#CCCCCC; width:700px;margin-left: 250px;margin-top: 100px;'; width:700px;'><table border='1' cellpadding='14px'>";
	echo "<form method='post' action=''>";
	while ($row = mysql_fetch_array($result))
	{
		echo"<tr><th align='left'>Q".$_SESSION['question']."</th><th align='left'> ".$row['question']."</th></tr>";
					echo "<tr><th align='left' colspan='2'><input type='checkbox' name='answer' value='a'>a) ".$row['option_a'].
					"</th></tr><tr><th align='left' colspan='2'><input type='checkbox' name='answer[]' value='b'>b)".$row['option_b'].
					"</th></tr><tr><th align='left' colspan='2'><input type='checkbox' name='answer[]' value='c'>c)  ".$row['option_c'].
					"</th></tr><tr><th align='left' colspan='2'><input type='checkbox' name='answer[]' value='d'>d)  ".$row['option_d'].
					"</th></tr>";
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
	echo "<tr><th colspan='2' align='center'><input type='submit' name='next' value='SUBMIT' style='height:25px; width:100px; font-weight:bold; background-color:#0099FF; color:#FFFFFF;'></th></tr> ";
	echo "</form>";
	echo"<tr><th colspan='2' align='center' width='700px'><button style='height:25px; width:100px; font-weight:bold; background-color:#0099FF; color:#FFFFFF;' width='700px'><a href='finish.php' style='text-decoration:none; color:#FF0000;'>FINISH</a></button></th></tr> ";
	echo "</table>";
?>