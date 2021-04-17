<!DOCTYPE html>
<html>
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

/*echo '<body><form method="post" action="newuser.php" id="mainForm" >
		First Name:<br>
		<input type="text" name="firstname" value="'.$fname.'" id="firstname" class="required">
		<br>
		Last Name:<br>
		<input type="text" name="lastname" value="'.$lname.'" id="lastname" class="required">
		<br>
		Username:<br>
		<input type="text" name="username" id="username" class="required">
		<br>
		email:<br>
		<input type="text" name="email" value="'.$email.'" id="email" class="required">
		<br>
		Password:<br>
		<input type="password" name="password" id="password" class="required">
		<br>
		Re-enter Password:<br>
		<input type="password" name="password-check" id="password-check" class="required">
		<br><br>
		<input type="submit" value="Create New User">
		</form></body>'; */

/* 

$host = "localhost";
$database = "project";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();

if($error != null) {
	$output = "<p>Unable to connect to database!</p>";
	exit($output);
}
else {
    $sql = "SELECT * FROM users WHERE username='".$uname."' OR email='".$email."';";
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
 */
?>

<body>
	<form method="post" action="addUser.php" id="mainForm">
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

</html>