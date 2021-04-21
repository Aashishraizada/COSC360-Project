<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html>
<?php

$uname = NULL;
$pswd = NULL;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $output = "<p>Invalid request.</p>";
    exit($output);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['username']) && isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['image']) && isset($_POST['email']) && isset($_POST['password'])) {
        $uname = $_POST['username'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $pswd = $_POST['password'];
        $image = $_POST['image'];
    } else {
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

if ($error != null) {
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
} else {
    $sql = "SELECT * FROM Users WHERE username='" . $uname . "' AND password='" . $pswd . "';";
    $results = mysqli_query($connection, $sql);
    //and fetch requsults
    if (mysqli_num_rows($results)) {// if user and password matches
        $row = mysqli_fetch_assoc($results);
        $sql = "UPDATE Users SET username='" . $uname . "', firstName='" . $fname . "', email='" . $email . "', password='" . $pswd . "', image='" . $image . "' WHERE username='" . $uname . "'";
        if (mysqli_query($connection, $sql)) {
            $_SESSION['error'] =  "Your account has been updated";
            header("Location: profile.php", TRUE, 301);
          } else {
            $_SESSION['error'] =  "Error updating your account, please try again";
            header("Location: profile.php", TRUE, 301);
          }
        
    } else {
        $_SESSION['error'] =  "User name or password incorrect";
        // if(isset($_SERVER['HTTP_REFERER'])) {
        // 	$ref = $_SERVER['HTTP_REFERER'];
        // 	echo "<a href='".$ref."'>Return to user entry</a>";
        // }
        header("Location: profile.php", TRUE, 301);
        //exit();
    }

    mysqli_free_result($results);
    mysqli_close($connection);
}
?>
<?php include "footer.php"; ?>

</html>