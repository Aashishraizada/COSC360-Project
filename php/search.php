<?php
$key = NULL;
$num = NULL;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['keyword'])) {
        $key = trim($_POST["keyword"]);
    }
    if (!empty($_POST["num"])) {
        $num = $_POST["num"];
    }
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['keyword'])) {
        $key = trim($_GET["keyword"]);
    }
    if (!empty($_GET["num"])) {
        $num = $_GET["num"];
    }
}

if (!is_null($key) && !empty($key)) {

    $serverName = "";
    $username = "";
    $password = "";
    $database = "";

    $connection = new mysqli($serverName, $username, $password, $database);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    } else {
        if ($num == 1) { //posts based on description
            $key = MySQLi_real_escape_string($connection, $key);
            $sql = "SELECT * FROM Post WHERE content LIKE '%".$key."%'";

            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12">
              <div class="post-header">
                <h3 class="col-md-8 post-title title-lg"><a href="blog-post.html">' . $row["title"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                  <li><a href="author.html">' . $row['username'] . '</a></li>
                  <li>' . $row['date'] . '</li>
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
                  <p>' . $row['content'] . '</p>
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
            </div>';
            }
        } else if ($num == 2) { //posts based on keywords
            $sql = "SELECT * FROM Post JOIN Tags ON Post.postId = Tags.pid WHERE tagName LIKE '%".$key."%'";

            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12">
              <div class="post-header">
                <h3 class="col-md-8 post-title title-lg"><a href="blog-post.html">' . $row["title"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                  <li><a href="author.html">' . $row['username'] . '</a></li>
                  <li>' . $row['date'] . '</li>
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
                  <p>' . $row['content'] . '</p>
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
            </div>';
            }
        } else if ($num == 3) { //posts based on user id
            $sql = "SELECT * FROM Post WHERE username LIKE '%".$key."%'";

            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12">
              <div class="post-header">
                <h3 class="col-md-8 post-title title-lg"><a href="blog-post.html">' . $row["title"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                  <li><a href="author.html">' . $row['username'] . '</a></li>
                  <li>' . $row['date'] . '</li>
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
                  <p>' . $row['content'] . '</p>
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
            </div>';
            }
        } else {//posts from all users
            $key = MySQLi_real_escape_string($connection, $key);
            $sql = "SELECT * FROM Post";

            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12">
              <div class="post-header">
                <h3 class="col-md-8 post-title title-lg"><a href="blog-post.html">' . $row["title"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                  <li><a href="author.html">' . $row['username'] . '</a></li>
                  <li>' . $row['date'] . '</li>
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
                  <p>' . $row['content'] . '</p>
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
            </div>';
            }
        }
        mysqli_free_result($results);
        mysqli_close($connection);
    }
}
