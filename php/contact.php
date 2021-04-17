<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header1.php"; ?>

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

<body>
<?php include "header2.php"; ?>
  <div id="main" class="section">

    <div class="container">

      <div class="row hot-post">
        <div id="main-post" class="col-md-8 hot-post-left">
          <div id="posts" class="post post-thumb col-md-12">
            <div class="col-md-12">
            <h1>Contact Us</h1>
              <hr class="rounded post-divider">
            </div>
            <div class="post-body col-md-12">
                <form method="post" action="processContact.php" id="contactUs" >
                        <div class="col-md-2 hot-post-left">
						First Name: </div>
                        <input type="text" name="fname" id="fname" class="required">
                        <br><br>
						<div class="col-md-2 hot-post-left">
                        Last Name: </div>
                        <input type="text" name="lname" id="lname" class="required">
                        <br><br>
						<div class="col-md-2 hot-post-left">
						Email: </div>
                        <input type="text" name="email" id="email" class="required">
                        <br><br>
						<div class="col-md-2 hot-post-left">
						Message: </div>
                        <textarea type="text" name="message" id="message" class="required" rows="4" cols="50">
                        </textarea>
						<br><br>
						<center><input type="submit" value="Send message" style="border:none"></center>
                </form>
            </div>
          </div>
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