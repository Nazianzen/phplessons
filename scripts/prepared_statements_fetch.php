<?php
include_once 'db_connect.php';

$data = '5';

// Create a template
$sql = "SELECT * FROM users WHERE id=?";

// Create a prepared statement
$stmt = mysqli_stmt_init($conn);

// Prepare the prepared statement
if(!mysqli_stmt_prepare($stmt, $sql)){
    echo "SQL statement failed";
} else {
    // Bind parameters to the placeholder
    mysqli_stmt_bind_param($stmt, 's', $data);
    // Run parameters inside database
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['username']."<br>";
    }
}

?>