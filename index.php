<?php 
  include("header.php");
?>

<div class="content">
  <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "scrumble";

    // Establish a connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Get Errors
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // SQL Query
    $query = "SELECT * FROM `post` ORDER BY PostID DESC";
    // Fetch data from the database
    $result = $conn->query($query);

    if($result->num_rows > 0) {
      // Display posts
      while($row = $result->fetch_assoc()) {
        $userID = $row['UserID'];
        $unameQuery = "SELECT UserName FROM `user` WHERE UserID = $userID";
        $unameResult = $conn->query($unameQuery);
        $unameRow = $unameResult->fetch_assoc();
        $row["UserName"] = $unameRow["UserName"];
        if ($row["PostImage"] != "") {
          echo "<div><b>@".$row["UserName"]. "</b> Wrote: <br>" . $row["PostContent"]. "<br><img src='". $row["PostImage"]. "' /></div>";
        }
        else {
          echo "<div><b>@".$row["UserName"]. "</b> Wrote:<br>" . $row["PostContent"]."</div>";
        }
        // Display reposts
        $postID = $row["PostID"];
        $repostQuery = "SELECT * FROM `repost` WHERE PostID = $postID";
        $repostResult = $conn->query($repostQuery);
        if ($repostResult != "") {
          while($repostRow = $repostResult->fetch_assoc()) {
            $repostUserID = $repostRow['UserID'];
            $repostUnameQuery = "SELECT UserName FROM `user` WHERE UserID = $repostUserID";
            $repostUnameResult = $conn->query($repostUnameQuery);
            $repostUnameRow = $repostUnameResult->fetch_assoc();
            $repostRow["UserName"] = $repostUnameRow["UserName"];
            if ($row["PostImage"] != "") {
              echo "<div><b>@".$repostRow["UserName"]. "</b> Reposted:<br>" . $row["PostContent"]. "<br><img src='". $row["PostImage"]. "' /></div>";
            }
            else {
              echo "<div><b>@".$repostRow["UserName"]. "</b> Reposted:<br>" . $row["PostContent"]."</div>";
            }
          }
        }
        // Display the comments
        $postID = $row["PostID"];
        $commentQuery = "SELECT * FROM `comment` WHERE PostID = $postID";
        $commentResult = $conn->query($commentQuery);
        if ($commentResult != "") {
          while($commentRow = $commentResult->fetch_assoc()) {
            $commentUserID = $commentRow['UserID'];
            $commentUnameQuery = "SELECT UserName FROM `user` WHERE UserID = $commentUserID";
            $commentUnameResult = $conn->query($commentUnameQuery);
            $commentUnameRow = $commentUnameResult->fetch_assoc();
            $commentRow["UserName"] = $commentUnameRow["UserName"];
            echo "<div><b>@".$commentRow["UserName"]. "</b> Commented:<br>" . $commentRow["CommentContent"]."</div>";
          }
        }
        echo "<button onclick=\"window.location.href='comment.php?post_id=".$row['PostID']."'\">Add comment</button> <span class=\"text-white\">| </span>";
        echo "<button onclick=\"window.location.href='repost.php?post_id=".$row['PostID']."'\">Repost</button>";
      }
    }
    else { // Error handling
      echo "<div><b>Error!</b><br>No posts found</div>";
    }
  ?>
</div>

<?php
  include("footer.php");
?>