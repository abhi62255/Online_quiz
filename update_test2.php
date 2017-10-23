<?php
		include 'database.php';
		database();	
		$id=$_POST['id'];
		$question=$_POST['question'];
		$option_a=$_POST['option_a'];
		$option_b=$_POST['option_b'];
		$option_c=$_POST['option_c'];
		$option_d=$_POST['option_d'];
		$answer=$_POST['answer'];
		$count=count($answer);
		echo $count;
		echo "hello";
			for($i=0; $i<$count; $i++)
			{
				${"answer" . $i}=$answer[$i];
			}
		if($count==1)
		{	
			echo "hello";
			echo $id;
			$r=mysql_query("update question set id=$id,question='$question',option_a='$option_a',option_b='$option_b',option_c='$option_c',option_d='$option_d',answer_1='$answer0',answer_2=null,answer_3=null,answer_4=null,answer_count=$count where id=$id");
			if($r){
				echo "Inserted";
			}
		}
		if($count==2)
		{	
			echo "hello";
			echo $id;
			echo $answer1;
			$r=mysql_query("update question set id=$id,question='$question',option_a='$option_a',option_b='$option_b',option_c='$option_c',option_d='$option_d',answer_1='$answer0',answer_2='$answer1',answer_3=null,answer_4=null,answer_count=$count where id=$id");
			if($r){
				echo "Inserted";
			}
		}
		if($count==3)
		{	
			echo "hello";
			$count=$count;
			$r=mysql_query("update question set id=$id,question='$question',option_a='$option_a',option_b='$option_b',option_c='$option_c',option_d='$option_d',answer_1='$answer0',answer_2='$answer1',answer_3='$answer2',answer_4=null,answer_count=$count where id=$id");
			if($r){
				echo "Inserted";
			}
		}
		if($count==4)
		{	
			echo "hello";
			$count=$count;
			$r=mysql_query("update question set id=$id,question='$question',option_a='$option_a',option_b='$option_b',option_c='$option_c',option_d='$option_d',answer_1='$answer0',answer_2='$answer1',answer_3='$answer2',answer_4='$answer3',answer_count=$count where id=$id");
			if($r){
				echo "Inserted";
			}
		}
		$_SESSION['value']=1;
		header('Location: update_test.php');
	

?>