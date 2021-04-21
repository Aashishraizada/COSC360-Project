<?php include "sessionHeader.php"; ?>
<?php

$num = NULL;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (isset($_POST['num'])) {
      $num = trim($_POST["num"]);
  }
}
$host = "mysql.aasrai.dreamhosters.com";
$database = "myblogsite";
$user = "cosc360";
$password = "adminpassword";

$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} else {
    $sql = "SELECT * FROM Post JOIN `User` ON Post.userId = `User`.userId ORDER BY likeCount DESC LIMIT 2";
    $results = mysqli_query($connection, $sql);
    echo '<div class="sidepost-header">
          <h3>Popular Posts</h3>
          <hr class="rounded">
          </div>';
    while ($row = mysqli_fetch_assoc($results)) {
        echo '<div class="col-md-4"><center>
          <img src="'.$row['postImage'].'" height=50px width=50px" alt="Hot Post">
          </div>
          <div class="post-body">
            <h4 class="post-title">'.$row['postTitle'].'</h3>
            <ul style="list-style-type: none" class="post-meta">
              <li style="display:inline">'.$row['username'].'</li>&nbsp;&nbsp;&nbsp;&nbsp;
              <li style="display:inline">'.$row['postDate'].'</li>
            </ul>
          </center></div>
          <hr class="solid">
        </div>';
    }
    mysqli_free_result($results);
    mysqli_close($connection);
}

?>
