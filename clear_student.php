<?php
		include 'database.php';
		database();
		$r=mysql_query("delete from login_details");
		if($r)
			$_SESSION['value']=2;
		header('Location: home.php');	
		
?>