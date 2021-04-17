<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header1.php"; ?>

<?php
if(!isset($_GET['username'])){
    header("Location: index.php", TRUE, 301);
}
$fname = null;
$lname = null;
$email = null;
$pswd = null;
$image = null;

$username=trim($_GET['username']);
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
  $sql = "SELECT * FROM Users WHERE username = 'lilmergo'";
  $results = mysqli_query($connection, $sql);
  $row = mysqli_fetch_assoc($results);
    $fname = $row['firstName'];
    $lname = $row['lastName'];
    $email = $row['email'];
    $image = $row['image'];
  
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
              <h1><?php echo $username ?>  profile</h1>
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
                User Name: 
                <?php echo $username; ?>"
                <br>
                First Name:
                <?php echo $fname; ?>
                <br>
                Last Name:
               <?php echo $lname; ?>
                <br>
                Image:
                <?php echo $image; ?>
                <br>
                Email:
                <?php echo $email; ?>
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