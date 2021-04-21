<!DOCTYPE html>
<?php
if(isset($_SESSION['username'])){
  $logPhp = "logOut.php";
  $logBut = "Log out";
  $user = "<a class='nav-link' href='profile.php'>Welcome " . $_SESSION['username']."</a>";
}
else{
  $logPhp = "login.php";
  $logBut = "Login";
  $user = '<a class="nav-link" href="signup.php">Sign Up</a>';
}

echo '<header>
  <nav id="banner" class="navbar navbar-expand-sm bg-dark navbar-dark" style="height: 144px;">
    <a class="navbar-brand" href="index.php" style="height: 144px;">
      <img src="../images/Untitled-1.jpg" alt="logo">
    </a>

    <ul class="nav navbar-nav navbar-right" style="padding-top: 10px;padding-right:35px;">
      <li class="nav-item">
        <a class="nav-link" href="'.$logPhp.'">'.$logBut.'</a>
      </li>

      <li class="nav-item">
      '.$user.'
      </li>
    </ul>
  </nav>

  <nav id="navBar" class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="index.php">Featured</a></li>
        <li><a href="newPost.php">New Post</a></li>
        <li><a href="profile.php">My Account</a></li>
        <li><a href="contact.php">Contact Us</a></li>
      </ul>
    </div>
  </nav>
</header>';

?>

