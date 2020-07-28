<?php

include_once 'db_connect.php';

$uname = $_POST['uname'];
$pass = $_POST['pass'];
$email = $_POST['email'];

$sql = "INSERT INTO users (username, email, password) 
VALUES ('$uname', '$email', '$pass');";
mysqli_query($conn, $sql);

$sql = "SELECT * FROM users WHERE username='$uname' AND email='$email';";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $user_id = $row['id'];
        $sql = "INSERT INTO profile_image (user_id, status) 
                VALUES ('$user_id', 1);";
        mysqli_query($conn, $sql);
        header("Location: ../profile_image.php");
    }
} else {
    echo "You have an error.";
}
