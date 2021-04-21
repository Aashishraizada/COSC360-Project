<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header1.php"; ?>
<?php include "header2.php"; ?>
<?php
if (isset($_SESSION['username'])) {
  $uname = $_SESSION['username'];
}else if (!isset($_SESSION['username'])){
    header("Location: login.php", TRUE, 301);
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
  $sql = "SELECT * FROM User WHERE username = '" . $uname . "'";
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
              <form method="post" action="../php/editProfile.php" id="mainForm">
                User Name:<br>
                <input type="text" name="username" id="username" value="<?php echo $uname; ?>" class="required">
                <br>
                First Name:<br>
                <input type="text" name="firstname" id="firstname" value="<?php echo $fname; ?>" class="required">
                <br>
                Last Name:<br>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lname; ?>" class="required">
                <br>
                Image:<br>
                <input type="text" name="image" id="image" value="<?php echo $image; ?>" class="required">
                <br>
                Email:<br>
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="required">
                <br>
                <h4>Enter and confirm password to make changes to your account:</h4>
                Password:<br>
                <input type="password" name="password" id="password" class="required">
                <br>
                Confirm Password<br>
                <input type="password" name="password" id="password" class="required">
                <br>
                <input type="submit" value="Make changes">
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