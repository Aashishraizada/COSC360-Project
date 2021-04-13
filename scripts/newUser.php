<!DOCTYPE html>
<html>

<?php

if ($_SERVER['REQUEST_METHOD']=="POST"||$_SERVER['REQUEST_METHOD']=="post") {
    
    if (isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        echo "<h1>Connected</h1>";
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $id = $_POST['ID'];
        $email = $_POST['email'];
        $userpassword = $_POST['password'];
        
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
            $sql = "SELECT * FROM users;";

            $results = mysqli_query($connection, $sql);

            //check if user exists
            $found = false;
            while ($row = mysqli_fetch_assoc($results)) {
                if($row['username']==$username||$row['email']==$email){
                    echo "User already exists with this name and/or email <br/>";
                    echo "<a href=\"http://localhost/lab9/lab9-1.html\">Return to user entry</a>";
                    $found = true;
                }
            }

            //if user doesn't exist then insert into database
            $hashedpass = md5($userpassword);
            if($found==false){
                $sql = "INSERT INTO users (firstName, lastName, ID, Email, Password) VALUES ('".$fname."', '".$lname."', '".$username."', '".$email."', '".$hashedpass."')";
                if (mysqli_query($connection, $sql)){
                    echo "An account for user ".$fname." has been created";
                    echo "<a href=\"http://localhost/lab9/lab9-1.html\">Return to user entry</a>";
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