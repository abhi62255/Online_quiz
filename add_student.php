<?php
		error_reporting(E_ALL ^ E_DEPRECATED);
		$con=mysql_connect('localhost','root','');
		$i=mysql_select_db('online_quiz',$con);
		session_start();	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
	<form action=""; method="post">
		Name <input type="text" name="username" /><br />
		Password <input type="password" name="password" /><br />
		<input type="submit" name="submit" value="Add" /><br />
	</form>
</body>
</html>
<?php
	if(isset($_POST['submit']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$r1=mysql_query("select * from login_details where username='$username'");
		if(mysql_num_rows($r1)==0)
		{
			$r=mysql_query("insert into login_details(username,password) values('$username','$password')");	
			echo "Student Added Successfully";
		}
		else
		{
			echo "Details Are incorrect";
		}
	}

?>
