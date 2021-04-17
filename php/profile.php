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
<header>
  <nav id="banner" class="navbar navbar-expand-sm bg-dark navbar-dark" style="height: 144px;">
    <a class="navbar-brand" href="#" style="height: 144px;">
      <img src="../images/Untitled-1.jpg" alt="logo">
    </a>

    <ul class="nav navbar-nav navbar-right">
      <li class="nav-item">
        <a class="nav-link" href="#">Login</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Sign Up</a>
      </li>
    </ul>
  </nav>

  <nav id="navBar" class="navbar navbar-inverse">
    <div class="container-fluid">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Featured</a></li>
        <li><a href="#">Post</a></li>
        <li><a href="#">Forms</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <form class="navbar-form navbar-right" action="scripts/search.php">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
          <select name = "dropdown" class="form-control">
          <option value = "tag" selected>Tag</option>
          <option value = "description">Description</option>
          <option value = "userId">User ID</option>
          <option value = "other">Other</option>
          </select>
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div>
  </nav>
</header>
  <div id="main" class="section">

    <div class="container">

      <div class="row hot-post">
        <div id="main-post" class="col-md-8 hot-post-left">
          <div id="posts" class="post post-thumb col-md-12">
            <div class="col-md-12">
            <h1>Recent Comments</h1>
              <hr class="rounded post-divider">
            </div>
            <div class="post-body col-md-12">
                <form method="post" action="../scripts/newPost.php" id="mainForm" >
                         User Name:
                        <input type="text" name="username" id="username" class="required">
                        <br>
                        First Name:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Last Name:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Image:<br>
                        <input type="text" name="image" id="image" class="required" >
                        <br>
                        Email:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Password:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Confirm Password<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        <input type="submit" value="Post">
                </form>
  
            </div>
          </div>
        </div>
        <div id="main-post" class="col-md-8 hot-post-left">
          <div id="posts" class="post post-thumb col-md-12">
            <div class="col-md-12">
            <h1>Recent Comments</h1>
              <hr class="rounded post-divider">
            </div>
            <div class="post-body col-md-12">
                <form method="post" action="../scripts/newPost.php" id="mainForm" >
                         User Name:
                        <input type="text" name="username" id="username" class="required">
                        <br>
                        First Name:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Last Name:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Image:<br>
                        <input type="text" name="image" id="image" class="required" >
                        <br>
                        Email:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Password:<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        Confirm Password<br>
                        <input type="text" name="title" id="title" class="required">
                        <br>
                        <input type="submit" value="Post">
                </form>
  
            </div>
          </div>
        </div>

		<div class="col-md-4 hot-post-right" id="signup">
			<div class="sidepost-header">
				<h3 >User Changes</h3>
				<hr class="rounded">
			</div>
			<form method="get" action="../php/fullSignup.php" id="mainForm" >
            <label class="col-md-5">User Name: </label>
				<input type="text" name="User name" id="firstname" class="required"><br>
                <label class="col-md-5">First Name: </label><br>
				<input type="text" name="firstname" id="firstname" class="required">
				<br><br>
				<label class="col-md-5">Last Name: </label>
				<input type="text" name="lastname" id="lastname" class="required">
				<br><br>
				<label class="col-md-5">E-mail: </label>
				<input type="text" name="email" id="email" class="required">
				<br><br>
                <label class="col-md-5">Password: </label>
				<input type="text" name="email" id="email" class="required"><br>
                <br>
                <label class="col-md-5">Confirm-Password </label>
                <br>
				<input type="text" name="email" id="email" class="required">
				<center><input type="submit" value="Confirm Changes" style="border:none"></center>
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

      </div>

    </div>

  </div>

	<footer>
	<div id="footer" class="footer-bottom row">
	  <div class="col-md-6">
		<ul class="footer-nav">
		  <li><a href="index.html">Home</a></li>
		  <li><a href="about.html">About Us</a></li>
		  <li><a href="contact.html">Contacts</a></li>
		</ul>
	  </div>
	</div>
	</footer>
</body>
</html>