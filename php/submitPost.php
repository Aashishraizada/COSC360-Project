<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html>
<?php include "header1.php"; ?>
<?php include "header2.php"; ?>
<?php

$uname = NULL;
$title = NULL;
$content = NULL;
$image = NULL;

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $output = "<p>Invalid request.</p>";
    exit($output);
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ( isset($_POST['title']) && isset($_POST['content']) && isset($_POST['image'])) {
        $uname = $_SESSION['username'];
        $title = $_POST['title'];
        $content = $_POST['content'];
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
} else { //insert new post
    $sql_new = "INSERT INTO Post (username, title, content, image) VALUES ('" . $uname . "', '" . $title . "', '" . $content . "', '" . $image . "')";
    if (mysqli_query($connection, $sql_new)) {
        $_SESSION['success'] = "<p>A post has been created!";
        header("Location: newPost.php", TRUE, 301);
    } else {
        $_SESSION['success'] = "<p>Unable to create post, try again!";
        header("Location: newPost.php", TRUE, 301);
    }
}
mysqli_close($connection);

?>
<?php include "footer.php"; ?>

</html>