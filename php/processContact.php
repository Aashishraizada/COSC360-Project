<!DOCTYPE html>
<html>
<?php include "header1.php"; ?>
<?php include "header2.php"; ?>
<?php

echo "<br>";

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
    $sql = "INSERT INTO ContactUs(firstName, lastName, email, message) VALUES ('".$fname."', '".$lname."', '".$email."', '".$msg."');";
    $results = mysqli_query($connection, $sql);

    //and fetch requsults
	if($results) {
		echo "<center><p>Thank you for contacting us. We will get in touch with you shortly.</p></center>";
	}
    //mysqli_free_result($results);
    mysqli_close($connection);
}
echo "<br><br>";
?>
<?php include "footer.php"; ?>
</html>
