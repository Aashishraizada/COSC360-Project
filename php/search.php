<?php include "sessionHeader.php"; ?>
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
$temp = "userId=";
if (!is_null($key) && !empty($key)) {

	$host = "mysql.aasrai.dreamhosters.com";
	$database = "myblogsite";
	$user = "cosc360";
	$password = "adminpassword";

    $connection = new mysqli($host, $user, $password, $database);

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
                <h3 class="col-md-8 post-postTitle postTitle-lg"><a href="blog-post.html">' . $row["postTitle"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                <li><a href="author.php?'.$temp.'"'.$row['userId'].'">' .$row['userId']. '</a></li>
                  <li>' . $row['postDate'] . '</li>
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
                  <li><a href="#">Keyword 1</a></li>
                  <li><a href="#">Keyword 2</a></li>
                </ul>
              </div>
            </div>';
            }
			if(mysqli_num_rows($results)) {
				$num = 6;
			}
        } else if ($num == 2) { //posts based on keywords
            $sql = "SELECT * FROM Post JOIN Tags ON Post.postId = Tags.pid WHERE tagName LIKE '%".$key."%'";

            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12">
              <div class="post-header">
                <h3 class="col-md-8 post-postTitle postTitle-lg"><a href="blog-post.html">' . $row["postTitle"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                <li><a href="author.php?'.$temp.'"'.$row['userId'].'">' .$row['userId']. '</a></li>
                  <li>' . $row['postDate'] . '</li>
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
                  <li><a href="#">Keyword 1</a></li>
                  <li><a href="#">Keyword 2</a></li>
                </ul>
              </div>
            </div>';
            }
			if(mysqli_num_rows($results)) {
				$num = 6;
			}
        } else if ($num == 3) { //posts based on user id
            $sql = "SELECT * FROM Post WHERE userId LIKE '%".$key."%'";

            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12">
              <div class="post-header">
                <h3 class="col-md-8 post-postTitle postTitle-lg"><a href="blog-post.html">' . $row["postTitle"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                <li><a href="author.php?'.$temp.'"'.$row['userId'].'">' .$row['userId']. '</a></li>
                  <li>' . $row['postDate'] . '</li>
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
                  <li><a href="#">Keyword 1</a></li>
                  <li><a href="#">Keyword 2</a></li>
                </ul>
              </div>
            </div>';
            }
			if(mysqli_num_rows($results)) {
				$num = 6;
			}
        } else if($num == 4){//posts from all users
            $sql = "SELECT * FROM Post";

            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12">
              <div class="post-header">
                <h3 class="col-md-8 post-postTitle postTitle-lg"><a href="blog-post.html">' . $row["postTitle"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                <li><a href="author.php?'.$temp.'"'.$row['userId'].'">' .$row['userId']. '</a></li>
                  <li>' . $row['postDate'] . '</li>
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
                  <li><a href="#">Keyword 1</a></li>
                  <li><a href="#">Keyword 2</a></li>
                </ul>
              </div>
            </div>';
            }
			if(mysqli_num_rows($results)) {
				$num = 6;
			}
        }  else if($num == 5){//2 posts
            $sql = "SELECT * FROM Post LIMIT 2";
			echo '<p>No matching posts found. Please try again.</p>';
            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12" style="visibility:hidden">
              <div class="post-header">
                <h3 class="col-md-8 post-postTitle postTitle-lg"><a href="blog-post.html">' . $row["postTitle"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                  <li><a href="author.html">' . $row['userId'] . '</a></li>
                  <li>' . $row['postDate'] . '</li>
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
                  <li><a href="#">Keyword 1</a></li>
                  <li><a href="#">Keyword 2</a></li>
                </ul>
              </div>
            </div>';
            }
        }
		if($num == 6){//1 posts
            $sql = "SELECT * FROM Post LIMIT 1";
            $results = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_assoc($results)) {
                echo '<div id="posts" class="post post-thumb col-md-12" style="visibility:hidden">
              <div class="post-header">
                <h3 class="col-md-8 post-postTitle postTitle-lg"><a href="blog-post.html">' . $row["postTitle"] . '</a></h3>
                <ul class="col-md-4 post-meta">
                  <li><a href="author.html">' . $row['userId'] . '</a></li>
                  <li>' . $row['postDate'] . '</li>
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
                  <li><a href="#">Keyword 1</a></li>
                  <li><a href="#">Keyword 2</a></li>
                </ul>
              </div>
            </div>';
            }
        }
        mysqli_free_result($results);
        mysqli_close($connection);
    }
}
