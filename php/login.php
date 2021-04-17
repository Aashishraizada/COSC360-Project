<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<?php include "header1.php"; ?>
<?php include "header2.php"; ?>
<body>
	<form method="post" action= "checkUser.php" id="loginForm">
		
	<?php 
		if( isset($_SESSION['username'])){
			echo "<p>".$_SESSION['error']."</p>";
			$_SESSION['error'] = null;
			echo "<br>";
		}else{
			echo session_status();
		}
	?>
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