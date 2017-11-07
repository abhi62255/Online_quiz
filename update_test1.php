<?php
include'home.php';
include 'database.php';
if(isset($_POST['submit']))
	{
		$id=$_POST['id'];
?>
		<form action="update_test2.php" method="post">
			<input type="hidden" name="id" value="<?php echo $id ;?>" />
			<textarea rows="5" cols="100" maxlength="1000" name="question" placeholder="Question" ></textarea><br /><br />
			<input type="text" name="option_a" placeholder="Option (A)"  />
			<input type="text" name="option_b" placeholder="Option (B)"  />
			<input type="text" name="option_c" placeholder="Option (C)"  />
			<input type="text" name="option_d" placeholder="Option (D)"  /><br /><br />
			Answers &nbsp;a)<input type="checkbox" name="answer[]" value="a"/>&nbsp;
			b)<input type="checkbox" name="answer[]" value="b"/>&nbsp;
			c)<input type="checkbox" name="answer[]" value="c"/>&nbsp;
			d)<input type="checkbox" name="answer[]" value="d"/><br /><br />
			<input type="reset"  />
			<input type="submit" name="next" value="Next" />
		</form>
<?php
}	
?>