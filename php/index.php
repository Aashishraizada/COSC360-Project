<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../Css/style.css">
  <script src="../js/index.js"></script>
  <script type="text/javascript" src="../js/validate.js"></script>
  
	<script>
	function checkPasswordMatch(e) {
		if(document.getElementById("password").value != document.getElementById("password-check").value){
			makeRed(document.getElementById("password"));
			makeRed(document.getElementById("password-check"));
			alert("The entered passwords do not match. Please try again.");
			e.preventDefault();
		}
	}
	</script>

</head>

<body>
<?php include "header.php"; ?>
  <div id="main" class="section">

    <div class="container">

      <div class="row hot-post">
        <div id="main-post" class="col-md-8 hot-post-left">
          <div id="posts" class="post post-thumb col-md-12">
            <div class="post-header">
              <h3 class="col-md-8 post-title title-lg"><a href="blog-post.html">Main Post 1</a></h3>
              <ul class="col-md-4 post-meta">
                <li><a href="author.html">John Doe</a></li>
                <li>20 April 2018</li>
              </ul>
            </div>
            <div class="col-md-12">
              <hr class="rounded post-divider">
            </div>
            <div class="post-body col-md-12">
              <div class="col-md-7">
                <a class="post-img" href="blog-post.html" ><img src="../images/cat.jpg" alt="cat pic"></a>
              </div>
              <div class="col-md-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu nibh in ipsum aliquam lacinia.
                  Proin rutrum accumsan luctus. Maecenas pulvinar est at nisl mattis cursus eu a est. Cras gravida, quam
                  vitae convallis faucibus, risus massa efficitur lorem, sed iaculis tortor velit vitae lectus. Nullam
                  sagittis sagittis nisi a laoreet.</p>
              </div>
            </div>
            <div class="post-footer col-md-12">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Comments</a></li>
                <li><a href="#">Keyword 1</a></li>
                <li><a href="#">Keyword 2</a></li>
                <li><a href="#">views</a></li>
                <li><a href="#">Share</a></li>
              </ul>
            </div>
          </div>

          <div id="posts" class="post post-thumb col-md-12">
            <div class="post-header">
              <h3 class="col-md-8 post-title title-lg"><a href="blog-post.html">Main Post 1</a></h3>
              <ul class="col-md-4 post-meta">
                <li><a href="author.html">John Doe</a></li>
                <li>20 April 2018</li>
              </ul>
            </div>
            <div class="col-md-12">
              <hr class="rounded post-divider">
            </div>
            <div class="post-body col-md-12">
              <div class="col-md-7">
                <a class="post-img" href="blog-post.html" ><img src="../images/cat.jpg" alt="cat pic"></a>
              </div>
              <div class="col-md-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu nibh in ipsum aliquam lacinia.
                  Proin rutrum accumsan luctus. Maecenas pulvinar est at nisl mattis cursus eu a est. Cras gravida, quam
                  vitae convallis faucibus, risus massa efficitur lorem, sed iaculis tortor velit vitae lectus. Nullam
                  sagittis sagittis nisi a laoreet.</p>
              </div>
            </div>
            <div class="post-footer col-md-12">
              <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="#">Comments</a></li>
                <li><a href="#">Keyword 1</a></li>
                <li><a href="#">Keyword 2</a></li>
                <li><a href="#">views</a></li>
                <li><a href="#">Share</a></li>
              </ul>
            </div>
          </div>
        </div>

		<div class="col-md-4 hot-post-right" id="signup">
			<div class="sidepost-header">
				<h3 >Signup</h3>
				<hr class="rounded">
			</div>
			<center>Already a user? <a id="goToLogin">Login</a></center><br><br>
			<form method="get" action="../php/fullSignup.php" id="mainForm" >
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
				<h3 >Login</h3>
				<hr class="rounded">
			</div>
			<center>Don't have an account? <a id="goToSignup">Signup</a></center><br><br>
			<form method="post" action="../php/newuser.php" id="mainForm" >
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
            <h3 >Popular Posts</h3>
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
            <h3 >Popular Tags</h3>
            <hr class="rounded" >
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