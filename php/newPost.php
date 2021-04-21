<?php if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header1.php"; ?>
<?php include "header2.php"; ?>

<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['error'] = "Please log in";
    header("Location: login.php", TRUE, 301);
}
?>


<body>
    <div id="main" class="section">
        <div class="container">

            <div class="row hot-post">
                <div id="main-post" class="col-md-8 hot-post-left">
                    <div id="posts" class="post post-thumb col-md-12">
                        <div class="col-md-12">
                            <h1>New Post</h1>
                            <hr class="rounded post-divider">
                        </div>
                        <div class="post-body col-md-12">
                            <?php
                            if (isset($_SESSION['success'])) {
                                echo $_SESSION['success'];
                                $_SESSION['success'] = "";
                            }
                            ?>
                            <form method="post" action="../php/submitPost.php" id="mainForm">
                                Title:<br>
                                <input type="text" name="title" id="title" class="required">
                                <br>
                                Content:<br>
                                <textarea type="text" name="content" id="content" class="required" rows="4" cols="50"></textarea>
                                <br>
                                Image:<br>
                                <input type="text" name="image" id="image" class="required">
                                <br><br>
                                Tag:<br>
                                <select id="tag" name="tag">
                                    <option value="1">lifestyle</option>
                                    <option value="2">food</option>
                                    <option value="3">music</option>
                                    <option value="4">news</option>
                                    <option value="5">politics</option>
                                    <option value="6">covid</option>
                                    <option value="7">animals</option>
                                </select>
                                <br>
                                <br>
                                <input type="submit" value="Post">
                            </form>

                        </div>
                    </div>
                </div>

                <!-- <div class="col-md-4 hot-post-right" id="signup">
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
		</div> -->

                <div class="col-md-4 hot-post-right" id="login" style="display:none">
                    <div class="sidepost-header">
                        <h3>Login</h3>
                        <hr class="rounded">
                    </div>
                    <center>Dont have an account? <a id="goToSignup">Signup</a></center><br><br>
                    <form method="post" action="../php/newuser.php" id="mainForm">
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