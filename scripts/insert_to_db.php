<?php
include_once 'db_connect.php';

$uname = mysqli_real_escape_string($conn, $_POST['uname']);
$pass = mysqli_real_escape_string($conn, $_POST['pass']);

$sql = "INSERT INTO users (username, password) VALUES ('$uname', '$pass')";

$results = mysqli_query($conn, $sql);

header("Location: ../index.php?signup=success");
