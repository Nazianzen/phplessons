<?php
session_start();
include_once 'scripts/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);

    if ($result_check > 0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $sql_img = "SELECT * FROM profile_image WHERE user_id";
            $result_img = mysqli_query($conn, $sql_img);
            while($row_img = mysqli_fetch_assoc($result_img)){
                echo "<div>";
                    if ($row_img['status'] == 0) {
                        echo "<img src='uploads/profile".$id.".jpg'>";
                    } else {
                        echo "<img src='uploads/profiledefault.jpg'>";
                    }
                    echo $row['username'];
                echo "</div>";
            }
        }
    } else {
        echo "There are no users yet.";
    }

    if (isset($_SESSION['id'])) {
        if ($_SESSION['id'] == 1) {
            echo "You are logged in as user #1";
        }
        echo    '<form action="scripts/upload.php" method="POST" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <button type="submit" name="submit">Upload</button>
                </form>';
    } else {
        echo "You are not logged in.";

        echo '
            <form action="scripts/sign_up_2.php" method="POST">
                <input type="username" name="uname" placeholder="Username">
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="pass" placeholder="Password">
                <button type="submit" name="submit">Sign up</button>
            </form>
        ';
    }
    ?>

    <p>Login as user</p>
    <form action="scripts/login.php" method="POST">
        <button type="submit" name="submit_login">Login</button>
    </form>

    <p>Logout as user</p>
    <form action="scripts/logout.php" method="POST">
        <button type="submit" name="submit_logout">Logout</button>
    </form>
</body>

</html>