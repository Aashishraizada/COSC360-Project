<!DOCTYPE html>
<html>
<?php include "header.php"; ?>
<body>
	<form method="post" action="checkUser.php" id="mainForm">
		Username:<br>
		<input type="text" name="username" id="username" class="required">
		<br>
		Password:<br>
		<input type="password" name="password" id="password" class="required">
		<br>
		<input type="submit" value="Log In">
	</form>
</body>
<?php include "footer.php"; ?>

</html>