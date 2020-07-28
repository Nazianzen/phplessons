<?php
include_once 'db_connect.php';

$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = "INSERT INTO users (username, password) VALUES (?, ?)";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    echo 'SQL error';
} else {
    mysqli_stmt_bind_param($stmt, "ss", $uname, $pass);
    mysqli_stmt_execute($stmt);
}

?>