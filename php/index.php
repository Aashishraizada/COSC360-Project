<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">


<?php include "header1.php"; ?>
<script>

  
</script>

<body>

  <?php include "header2.php"; ?>
  <div id="main" class="section">

    <div class="container">

      <div class="row hot-post">
        <div id="main-post" class="col-md-8 hot-post-left">
          <?php
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
            $sql = "SELECT * FROM Post";
            $results = mysqli_query($connection, $sql);

            //and fetch requsults
            
          }

          mysqli_free_result($results);
          mysqli_close($connection);
          ?>
        </div>

        <div class="col-md-4 hot-post-right" id="signup">
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

        <div class="col-md-4 hot-post-right">
          <div class="sidepost-header">
            <h3>Popular Posts</h3>
            <hr class="rounded">
          </div>


          <div id="side-post" class="post post-thumb">
            <div class="col-md-4">
              <a class="img-thumbnail" href="index.html"><img src="../Css/style.css" alt="Cat pic"></a>
            </div>
            <div class="post-body">
              <h3 class="post-title"><a href="index.html">Side post 1</a></h3>
              <ul class="post-meta">
                <li><a href="index.html">John Doe</a></li>
                <div class="post-category">
                  <a href="category.html"><i class="fa fa-caret-square-o-down" aria-hidden="true"></i></a>
                </div>
                <li>20 April 2018</li>
              </ul>
            </div>
            <hr class="solid">
          </div>

          <div id="side-post" class="post post-thumb">
            <div class="col-md-4">
              <a class="img-thumbnail" href="index.html"><img src="../images/cat.jpg" alt="Cat pic"></a>
            </div>
            <div class="post-body">
              <h3 class="post-title"><a href="index.html">Side Post 2</a></h3>
              <ul class="post-meta">
                <li><a href="index.html">John Doe</a></li>
                <li>20 April 2018</li>
              </ul>
            </div>
          </div>
          <hr class="solid">
        </div>

        <div class="col-md-4 hot-post-right">
          <div class="sidepost-header">
            <h3>Popular Tags</h3>
            <hr class="rounded">
          </div>
          <p id="tag">#keyword1</p>
          <p id="tag">#keyword2</p>
          <p id="tag">#keyword3</p>
          <p id="tag">#keyword4</p>
          <p id="tag">#keyword5</p>
          <p id="tag">#keyword6</p>
        </div>


      </div>

    </div>

  </div>

  <?php include "footer.php"; ?>

</body>

</html>