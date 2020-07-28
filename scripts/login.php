<?php

session_start();

if(isset($_POST['submit_login'])){
    $_SESSION['id'] = 1;
    header("Location: ../profile_image.php");
}