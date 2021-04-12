<!DOCTYPE html>
<html>

<p>Here are some results:</p>

<?php

$host = "sql3.freesqldatabase.com";
$database = "sql3404847";
$user = "sql3404847";
$password = "TuyFjKXzrh";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
    //good connection, so do you thing
    $sql = "SELECT * FROM users;";

    $results = mysqli_query($connection, $sql);

    //and fetch requsults
    while ($row = mysqli_fetch_assoc($results))
    {
      echo $row['Name']." ".$row['ID']." ".$row['Image']." ".$row['Email']." ".$row['Password']."<br/>";
    }

    mysqli_free_result($results);
    mysqli_close($connection);
}
?>