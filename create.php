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
        // Check to see if username or password is blank
        if ($user_name == "" || $password == "") {
            echo "Username or password cannot be blank";
            exit();
        }
        // If username matches another username in the database, return an error
        $sql = "SELECT * FROM user WHERE UserName = '$user_name'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "Username already exists";
            exit();
        }
        $sql = "INSERT INTO user (`UserID`, `UserName`, `Password`) VALUES (NULL, '$user_name', '$password')";
        if(mysqli_query($conn, $sql)){
            echo "<h3>Account created!</h3>";
            header('Location: index.php');
        } else {
            echo "ERROR: Hush! Sorry $sql. "
                . mysqli_error($conn);
        }

        // Close connection
        $conn->close();
    ?>
</body>
</html>