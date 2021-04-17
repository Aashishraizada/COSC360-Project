<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html>
<?php include "header1.php"; ?>
<body>
<?php include "header2.php"; ?>
	<form method="post" action= "checkUser.php" id="loginForm">
		<h1>Log in to your account!</h1>
	<?php 
		if( isset($_SESSION['error'])){
			echo "<p>".$_SESSION['error']."</p>";
			$_SESSION['error'] = "";
			echo "<br>";
		}
		
		if(isset($_SESSION['message'])){
			echo "<p>".$_SESSION['message']."</p>";
			$_SESSION['message'] = "";
			echo "<br>";
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