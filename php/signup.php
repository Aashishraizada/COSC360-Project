<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html>
<?php include "header1.php"; ?>
<?php include "header2.php"; ?>
<?php

$fname = NULL;
$lname = NULL;
$uname = NULL;
$email = NULL;
$pswd = NULL;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	if (isset($_GET['firstname']) && isset($_GET['lastname'])  && isset($_GET['email'])) {
		$fname = $_GET['firstname'];
		$lname = $_GET['lastname'];
		$email = $_GET['email'];
	}
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['firstname']) && isset($_POST['lastname']) &&  isset($_POST['email'])) {
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$email = $_POST['email'];
	}
}
?>

<body>
	<?php
		if(isset($_SESSION['message'])){
			echo "<p>".$_SESSION['message']."</p>";
			$_SESSION['message'] = "";
			echo "<br>";
		}	
	?>
	<form method="post" action="addUser.php" id="signUpForm">
		First Name:<br>
		<input type="text" name="firstname" value="<?php echo $fname; ?>" id="firstname" class="required">
		<br>
		Last Name:<br>
		<input type="text" name="lastname" value="<?php echo $lname; ?>" id="lastname" class="required">
		<br>
		Username:<br>
		<input type="text" name="username" id="username" class="required">
		<br>
		email:<br>
		<input type="text" name="email" value="<?php echo $email; ?>" id="email" class="required">
		<br>
		Password:<br>
		<input type="password" name="password" id="password" class="required">
		<br>
		Re-enter Password:<br>
		<input type="password" name="password-check" id="password-check" class="required">
		<br><br>
		<input type="submit" value="Create New User">
	</form>
</body>
<?php include "footer.php"; ?>
</html>