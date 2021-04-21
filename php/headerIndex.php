<!DOCTYPE html>
<?php
if(isset($_SESSION['username'])){
  $logPhp = "logOut.php";
  $logBut = "Log out";
  $user = "Welcome " . $_SESSION['username'];
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

    <ul class="nav navbar-nav navbar-right">
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
      <form class="navbar-form navbar-right">
        <div class="form-group">
          <input type="text" id="search" class="form-control" placeholder="Search">
          <select id="category" name = "dropdown" class="form-control">
          <option value = "2">Tag</option>
          <option value = "1" selected>Description</option>
          <option value = "3">Author</option>
          <option value = "4">Other</option>
          </select>
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div>
  </nav>
</header>';

?>

