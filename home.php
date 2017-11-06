<?php
	session_start();
	if($_SESSION['value']==1)
		echo "Test Cleared <br />";	
	if($_SESSION['value']==2)
		echo "Student Cleared <br />";
		
	$_SESSION['value']=0;

?>

<html>
<head>
<title>Quiz</title>
</head>

<body>
	<table border="0" cellspacing="30px">
		<tr><th><a href="make_test0.php">Make Test</a></th>
		<th><a href="make_test.php">Add Questions</a></th>
		<th><a href="update_test.php">Update Questions</a></th>
		<th><a href="view_test.php">View Test</a></th>
		<th><a href="clear_test.php">Clear Test</a></th>
		<th><a href="add_student.php">Add Students</a></th>
		<th><a href="view_student.php">View Students</a></th>
		<th><a href="update_student.php">Update Students</a></th>
		<th><a href="clear_student.php">Clear_student</a></th>
		<th><a href="result.php">Result</a></th></tr>
	</table>
</body>
</html>
