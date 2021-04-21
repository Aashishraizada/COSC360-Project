<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html>
<?php

$uname = NULL;
$pswd = NULL;

if($_SERVER["REQUEST_METHOD"] == "GET") {
  $output = "<p>Invalid request.</p>";	
  exit($output);
}
else if($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['username']) && isset($_POST['password'])){
		
		$uname = $_POST['username'];
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
	//encrypt submitted password for comparison
	$encryptedpswd = md5($pswd);
    $sql = "SELECT * FROM Users WHERE username='".$uname."' AND password='".$encryptedpswd."';";
    $results = mysqli_query($connection, $sql);
    //and fetch requsults
	if(mysqli_num_rows($results)) {
		$row = mysqli_fetch_assoc($results);
		$_SESSION["username"] = $row["username"];
		header("Location: index.php", TRUE, 301);
		
	} else {
			$_SESSION['error'] =  "User name or password incorrect";
			// if(isset($_SERVER['HTTP_REFERER'])) {
			// 	$ref = $_SERVER['HTTP_REFERER'];
			// 	echo "<a href='".$ref."'>Return to user entry</a>";
			// }
			header("Location: login.php", TRUE, 301);
			//exit();
			
	}

    mysqli_free_result($results);
    mysqli_close($connection);
}
?>
<?php include "footer.php"; ?>
</html>
