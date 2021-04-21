<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html>
<?php

$fname = NULL;
$lname = NULL;
$uname = NULL;
$email = NULL;
$pswd = NULL;

if($_SERVER["REQUEST_METHOD"] == "GET") {
  $output = "<p>Invalid request.</p>";
  exit($output);
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
		$fname = $_POST['firstname'];
		$lname = $_POST['lastname'];
		$uname = $_POST['username'];
		$email = $_POST['email'];
		$pswd = $_POST['password'];
	}
	else {
		$output = "<p>Invalid data input.</p>";
		exit($output);
	}
}

$host = "mysql.aasrai.dreamhosters.com";
$database = "myblogsite";
$user = "cosc360";
$password = "adminpassword";

$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();

if($error != null) {
	$output = "<p>Unable to connect to database!</p>";
	exit($output);
}
else {
    $sql = "SELECT * FROM User WHERE username='".$uname."' OR email='".$email."';";
    $results = mysqli_query($connection, $sql);

    //and fetch requsults
	if(mysqli_num_rows($results)) {
			$_SESSION['message']= "User already exists with this name and/or email.";
			header("Location: signup.php", TRUE, 301);
	}
	else {
		//encrypt password before insertion
		$encryptedpswd = md5($pswd);

		$sql_new = "INSERT INTO User (firstname, lastname, username, email, password) VALUES ('".$fname."', '".$lname."', '".$uname."', '".$email."', '".md5($encryptedpswd)."')";
		if(mysqli_query($connection, $sql_new)) {
			$_SESSION['message']= "An account for the user '".$fname."' has been created. Sign in now!";
			header("Location: login.php", TRUE, 301);
		}
		else {
			$output = "<p>Unable to add data to the database.<br>Error: ".$sql_new."".mysqli_error($connection)."</p>";
			exit($output);
		}
	}

    mysqli_free_result($results);
    mysqli_close($connection);
}
?>
<?php include "footer.php"; ?>
</html>
