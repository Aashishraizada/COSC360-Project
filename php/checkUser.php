<!DOCTYPE html>
<html>
<?php include "header.php"; ?>
<?php

$uname = NULL;
$pswd = NULL;

if($_SERVER["REQUEST_METHOD"] == "GET") {
  $output = "<p>Invalid request.</p>";
  exit($output);
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']))
		$uname = $_POST['username'];
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
    $sql = "SELECT * FROM Users WHERE id='1' OR email='".$email."';";
    $results = mysqli_query($connection, $sql);
    //and fetch requsults
	if(mysqli_num_rows($results)) {
		$row = mysqli_
		echo "<p>User already exists with this name and/or email.</p>";
		if(isset($_SERVER['HTTP_REFERER'])) {
			$ref = $_SERVER['HTTP_REFERER'];
			echo "<a href='".$ref."'>Return to user entry</a>";
		}
	}

    mysqli_free_result($results);
    mysqli_close($connection);
}
?>
<?php include "footer.php"; ?>
</html>
