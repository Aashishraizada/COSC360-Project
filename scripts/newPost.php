<!DOCTYPE html>
<html>

<?php

if ($_SERVER['REQUEST_METHOD']=="POST"||$_SERVER['REQUEST_METHOD']=="post") {
    
    if (isset($_POST['username'])&& isset($_POST['title']) && isset($_POST['content']) && isset($_POST['image'])) {
        
        $username = $_POST['username'];
        $content = $_POST['content'];
        $image = $_POST['image'];
        $title = $_POST['title'];
        $likes = 0;
        
        $host = "sql3.freesqldatabase.com";
        $database = "sql3404847";
        $user = "sql3404847";
        $password = "TuyFjKXzrh";
        
        
        $connection = mysqli_connect($host, $user, $password, $database);
        $error = mysqli_connect_error();
        if ($error != null) {
            $output = "<p>Unable to connect to database!</p>";
            exit($output);
        } else {
            //good connection, so do you thing
            $sql = "SELECT * FROM Users;";

            $results = mysqli_query($connection, $sql);

            //check if user exists
            $found = false;
            while ($row = mysqli_fetch_assoc($results)) {
                if($row['username']==$username){
                    $found = true;
                }
            }
            //if user doesn't exist then insert into database
            if($found==true){
                $sql = "INSERT INTO Post (title,content,username,date, likes,image) VALUES ('".$title."','".$content."', '".$username."', 'GETDATE()', '".$likes."', '".$image."')";
                if (mysqli_query($connection, $sql)){
                    echo " ".$username." has made a post";
                    header("Location: http://localhost/COSC360-Project/html/index.html", TRUE, 301);
                    exit();
                }else{
                    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                }
            }
            

            mysqli_free_result($results);
            mysqli_close($connection);
        }
    }
}else{
    echo "Error: Invalid server method request<br/>";
    echo "<a href=\"http://localhost/lab9/lab9-1.html\">Return to user entry</a>";
}
?>

</html>