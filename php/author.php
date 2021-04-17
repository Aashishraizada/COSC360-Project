<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header1.php"; ?>

<?php
if (isset($_SESSION['username'])) {
  $uname = $_SESSION['username'];
}
if(!isset($_POST['username'])){
    //header("Location: index.php", TRUE, 301);
}

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
  $sql = "SELECT * FROM Users WHERE username = '". $_POST['username']."'";
  $results = mysqli_query($connection, $sql);
  while ($row = mysqli_fetch_assoc($results)) {
    $fname = $row['firstName'];
    $lname = $row['lastName'];
    $email = $row['email'];
    $pswd = $row['password'];
    $image = $row['image'];
  }
}
?>

<body>
<?php include "header2.php"; ?>
  <div id="main" class="section">

    <div class="container">

      <div class="row hot-post">
        <div id="main-post" class="col-md-8 hot-post-left">
          <div id="posts" class="post post-thumb col-md-12">
            <div class="col-md-12">
              <h1>User profile</h1>
              <hr class="rounded post-divider">
            </div>
            <div class="post-body col-md-12">
              <?php 
              if(isset($_SESSION['error'] )){
                echo $_SESSION['error'] ;
                $_SESSION['error'] =  "";
              }
              
              ?>
              <form method="post" action="index.php" id="mainForm">
                User Name:<br>
                <input type="text" name="username" id="username" value="<?php echo $uname; ?>" class="required readonly">
                <br>
                First Name:<br>
                <input type="text" name="firstname" id="firstname" value="<?php echo $fname; ?>" class="required readonly">
                <br>
                Last Name:<br>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lname; ?>" class="required readonly">
                <br>
                Image:<br>
                <input type="text" name="image" id="image" value="<?php echo $image; ?>" class="required readonly">
                <br>
                Email:<br>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="required readonly">
                <br>
                <input type="submit" value="Back to home">
              </form>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  <?php include "footer.php"; ?>
</body>

</html>