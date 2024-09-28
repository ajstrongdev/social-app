<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "scrumble";

    $conn = new mysqli($servername, $username, $password, $database);
    // Check connection
    if($conn === false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
        $user_name =  $_REQUEST['user_name'];
        $password = $_REQUEST['password'];
        // Query to verify username and password
        $query = "SELECT * FROM user WHERE UserName = '$user_name' AND Password = '$password'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $uid = $result->fetch_assoc()['UserID'];
            $pid = $_REQUEST['post_id'];
            $post_content = $_REQUEST['comment_content'];
            // if comment content is blank
            if ($post_content == "") {
                echo "Comment must contain content";
                exit();
            }
            $sql = "INSERT INTO comment (`CommentID`, `PostID`, `UserID`, `CommentContent`) VALUES (NULL, $pid, $uid, '$post_content')";
            if(mysqli_query($conn, $sql)){
                echo "<h3>Posted!</h3>";
                header('Location: index.php');
            } else {
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
        } else {
            // Login failed
            echo "Invalid username or password!";
        }

        // Close connection
        $conn->close();
    ?>
</body>
</html>