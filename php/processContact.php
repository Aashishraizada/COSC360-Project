<!DOCTYPE html>
<html>
<?php

$fname = NULL;
$lname = NULL;
$email = NULL;
$msg = NULL;

if($_SERVER["REQUEST_METHOD"] == "GET") {
  $output = "<p>Invalid request.</p>";
  exit($output);
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['message'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$msg = $_POST['message'];
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
    $sql = "INSERT INTO ContactUs VALUES ('".$fname."', '".$lname."', '".$email."', '".$msg."');";
    $results = mysqli_query($connection, $sql);

    //and fetch requsults
	if($results) {
		echo "<p>Thank you for contacting us. We will get in touch with you shortly.</p>";
	}
    //mysqli_free_result($results);
    mysqli_close($connection);
}
?>
<?php include "footer.php"; ?>
</html>
