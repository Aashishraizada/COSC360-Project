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
    if (isset($_POST['title']) && isset($_POST['content']) && isset($_POST['image'])) {
        $uname = $_SESSION['username'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $tagId = $_POST['tag'];
        //3 more tag variables
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
    //sql statement to get userid
    $uId_sql = "SELECT userId FROM `User` WHERE username = '" . $uname . "'";
    $result1 = mysqli_query($connection, $uId_sql);
    $row = mysqli_fetch_assoc($result1);
    $uId = $row['userId'];
    $currentDate= date("Y-m-d");
    $sql_new = "INSERT INTO Post (userId, postTitle, content, postImage, postDate, likeCount) VALUES ('" . $uId . "', '" . $title . "', '" . $content . "', '" . $image . "', '" .$currentDate."','0')";
    //if post has been inserted into database
    if (mysqli_query($connection, $sql_new)) {
        header("Location: newPost.php", TRUE, 301);
        //sql: select postid from post where title= $title and uname and content
        $postId_sql = "SELECT postId FROM Post WHERE postTitle ='" . $title . "' AND userId='" . $uId . "' AND content = '" . $content . "'";
        $result2 = mysqli_query($connection, $postId_sql);
        $row = mysqli_fetch_assoc($result2);
        $postId = $row['postId'];
        //insert into related the postid and the tag id
        $sql_insert = "INSERT INTO Related VALUES ('" . $tagId . "','" . $postId . "')";
        if (mysqli_query($connection, $sql_insert)) {
            $_SESSION['success'] = "<p>A post has been created!";
        }

    } else {
        $_SESSION['success'] = "<p>Unable to create post, try again!";
        header("Location: newPost.php", TRUE, 301);
    }
}
mysqli_close($connection);

?>
<?php include "footer.php"; ?>

</html>