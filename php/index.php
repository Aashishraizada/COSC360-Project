<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">

<?php include "header1.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/search.js"></script>
<script>
  setInterval(function(){ 
    $.post("tracker.php", {num: 1}).done(function(data) {
          $("#side-posts").html(data);
    }); 
  }, 1000);
  setInterval(function(){ 
    $.post("tagTracker.php", {num: 1}).done(function(data) {
          $("#popular-tags").html(data);
    }); 
  }, 1000);
</script> 
<body>

  <?php include "headerIndex.php"; ?>
  <div id="main" class="section">

    <div class="container">

      <div class="row hot-post">
        <div id="main-post" class="col-md-8 hot-post-left">
          
        </div>

        <?php 
        if (!isset($_SESSION['username'])) {
          echo '<div class="col-md-4 hot-post-right" id="signup">
          <div class="sidepost-header">
            <h3>Signup</h3>
            <hr class="rounded">
          </div>
          <center>Already a user? <a id="goToLogin">Login</a></center><br><br>
          <form method="get" action="../php/signup.php" id="loginForm">
            <label class="col-md-5">First Name: </label>
            <input type="text" name="firstname" id="firstname" class="required">
            <br><br>
            <label class="col-md-5">Last Name: </label>
            <input type="text" name="lastname" id="lastname" class="required">
            <br><br>
            <label class="col-md-5">E-mail: </label>
            <input type="text" name="email" id="email" class="required">
            <br><br><br>
            <center><input type="submit" value="Create New User" style="border:none"></center>
            <br><br>
          </form>
        </div>

        <div class="col-md-4 hot-post-right" id="login" style="display:none">
          <div class="sidepost-header">
            <h3>Login</h3>
            <hr class="rounded">
          </div>
          <center>Don\'t have an account? <a id="goToSignup">Signup</a></center><br><br>
          <form method="post" action="../php/checkUser.php" id="signUpForm">
            <label class="col-md-5">Username: </label>
            <input type="text" name="username" id="username" class="required">
            <br><br>
            <label class="col-md-5">Password: </label>
            <input type="password" name="password" id="password" class="required">
            <br><br><br>
            <center><input type="submit" value="Login" style="border:none"></center>
            <br><br>
          </form>
        </div>';
        }
        ?>

        <div class="col-md-4 hot-post-right" id="login" style="display:none">
          <div class="sidepost-header">
            <h3>Login</h3>
            <hr class="rounded">
          </div>
          <center>Don't have an account? <a id="goToSignup">Signup</a></center><br><br>
          <form method="post" action="../php/newuser.php" id="signUpForm">
            <label class="col-md-5">Username: </label>
            <input type="text" name="username" id="username" class="required">
            <br><br>
            <label class="col-md-5">Password: </label>
            <input type="password" name="password" id="password" class="required">
            <br><br><br>
            <center><input type="submit" value="Login" style="border:none"></center>
            <br><br>
          </form>
        </div>

        <div class="col-md-4 hot-post-right" id="side-posts">
        </div>

        <div class="col-md-4 hot-post-right" id="popular-tags">
          <!-- <div class="sidepost-header">
            <h3>Popular Tags</h3>
            <hr class="rounded">
          </div>
          <p id="tag">#keyword1</p>
          <p id="tag">#keyword2</p>
          <p id="tag">#keyword3</p>
          <p id="tag">#keyword4</p>
          <p id="tag">#keyword5</p>
          <p id="tag">#keyword6</p> -->
        </div>


      </div>

    </div>

  </div>

  <?php include "footer.php"; ?>

</body>

</html>