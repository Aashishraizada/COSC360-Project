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
    $sql = "SELECT DISTINCT tagName FROM Related JOIN Tag ON Tag.tagId = Related.tagId GROUP BY postId ORDER BY COUNT(Tag.tagId) DESC LIMIT 3";
    $results = mysqli_query($connection, $sql);
    echo '<div class="sidepost-header">
          <h3>Popular Tags</h3>
          <hr class="rounded">
          </div>';
    while ($row = mysqli_fetch_assoc($results)) {
        echo '<p id="tag">#'.$row['tagName'].'</p>';
    }
    echo '<br><br>';
    mysqli_free_result($results);
    mysqli_close($connection);
}

?>
