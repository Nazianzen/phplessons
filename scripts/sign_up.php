<?php

// Check if button was clicked
if (!isset($_POST['submit'])) {
    // Return with error header 'error'
    header("Location: ../index.php?signup=error");
    exit();
} else {
    // Import database connection
    include_once 'db_connect.php';

    // Get and escape user inputs
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['pass']);

    // Check if inputs are empty
    if (empty($uname) || empty($email) || empty($pass)) {
        // If empty, return with error header 'empty'
        header("Location: ../index.php?signup=empty&uname=$uname&email=$email");
        exit();
    } else {
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // If not valid, return error header 'sql_error'
            header("Location: ../index.php?signup=invalid_email&uname=$uname");
            exit();
        } else {
            // Create an SQL template for checking users
            $sql = "SELECT * FROM users WHERE username=?";

            // Create a prepared statement
            $stmt = mysqli_stmt_init($conn);

            // Prepare the prepared statement
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                // If prepared statement fails, return with error header 'sql_error'
                header("Location: ../index.php?signup=sql_error&uname=$uname&email=$email");
                exit();
            } else {
                // Bind parameters to the placeholder
                mysqli_stmt_bind_param($stmt, 's', $uname);
                // Run parameters inside database
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                $result_check = mysqli_num_rows($result);

                // Check if username is taken
                if ($result_check > 0) {
                    // If taken, return with error header 'username_taken'
                    header("Location: ../index.php?signup=username_taken&uname=$uname&email=$email");
                    exit();
                // Create user.
                } else {
                    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);

                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        header("Location: ../index.php?signup=sql_error&uname=$uname&email=$email");
                        exit();
                    } else {
                        // Hash the password
                        $hashed_pwd = password_hash($pass, PASSWORD_DEFAULT);

                        mysqli_stmt_bind_param($stmt, "sss", $uname, $email, $hashed_pwd);
                        mysqli_stmt_execute($stmt);

                        header("Location: ../index.php?signup=success");
                        exit();
                    }
                }
            }
        }
    }
}
