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
	<a href="make_test0.php">Make Test</a><br />
	<a href="make_test.php">Add Questions</a><br />
	<a href="update_test.php">Update Questions</a><br />
	<a href="view_test.php">View Test</a><br />
	<a href="clear_test.php">Clear Test</a><br />
	<a href="add_student.php">Add Students</a><br />
	<a href="view_student.php">View Students</a><br />
	<a href="update_student.php">Update Students</a><br />
	<a href="clear_student.php">Clear_student</a><br />
	<a href="result.php">Result</a><br />
	
</body>
</html>
