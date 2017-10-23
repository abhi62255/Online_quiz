<?php
		include 'database.php';
		database();
		$r=mysql_query("delete from question");
		if($r)
			$_SESSION['value']=1;
		header('Location: home.php');	
		
?>