<?php
include_once 'db_connect.php';

$sql = "SELECT * FROM users";

$results = mysqli_query($conn, $sql);

$result_checker = mysqli_num_rows($results);

if($result_checker > 0){
    while($row = mysqli_fetch_assoc($results)){
        echo $row['username'];
        echo $row['password'];
    }
}


?>