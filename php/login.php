<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html>
<?php include "header1.php"; ?>

<body>
	<?php include "header2.php"; ?>
	<div id="main" class="section">

		<div class="container">

			<div class="row hot-post">
				<div id="main-post" class="col-md-8 hot-post-left">
					<div id="posts" class="post post-thumb col-md-12">
						<div class="col-md-12">
							<h1>Log in to your account!</h1>
							<hr class="rounded post-divider">
						</div>
						<div class="post-body col-md-12">
							<form method="post" action="checkUser.php" id="loginForm">
								<?php
								if (isset($_SESSION['error'])) {
									echo "<p>" . $_SESSION['error'] . "</p>";
									$_SESSION['error'] = "";
									echo "<br>";
								}
								if (isset($_SESSION['message'])) {
									echo "<p>" . $_SESSION['message'] . "</p>";
									$_SESSION['message'] = "";
									echo "<br>";
								}
								?>
								Username:<br>
								<input type="text" name="username" id="username" class="required">
								<br>
								Password:<br>
								<input type="password" name="password" id="password" class="required">
								<br><br>
								<input type="submit" value="Log In">
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