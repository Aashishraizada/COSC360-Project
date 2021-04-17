<!DOCTYPE html>
<html>
<?php include "header.php"; ?>
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

$host = "sql3.freesqldatabase.com";
$database = "sql3404847";
$user = "sql3404847";
$password = "TuyFjKXzrh";

$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();

if($error != null) {
	$output = "<p>Unable to connect to database!</p>";
	exit($output);
}
else {
    $sql = "SELECT * FROM Users WHERE username='".$uname."' OR email='".$email."';";
    $results = mysqli_query($connection, $sql);

    //and fetch requsults
	if(mysqli_num_rows($results)) {
		echo "<p>User already exists with this name and/or email.</p>";
		if(isset($_SERVER['HTTP_REFERER'])) {
			$ref = $_SERVER['HTTP_REFERER'];
			echo "<a href='".$ref."'>Return to user entry</a>";
		}
	}
	else {
		$sql_new = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('".$fname."', '".$lname."', '".$uname."', '".$email."', '".md5($pswd)."')";
		if(mysqli_query($connection, $sql_new)) {
			echo "<p>An account for the user '".$fname."' has been created</p>";
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
