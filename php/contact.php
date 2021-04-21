<?php include "sessionHeader.php"; ?>
<!DOCTYPE html>
<html lang="en">
<?php include "header1.php"; ?>

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

		

      </div>

    </div>

  </div>

  <?php include "footer.php"; ?>
</body>
</html>