<?php
    include 'header.php';
    include 'scripts/password_hash.php';

    echo $pwd;
    echo "<br>";
    echo $pwd_hash;
    echo "<br>";
    echo $pwd_verify;

?>

<main>
    <div>
        <h1>
            <?php
            if (!isset($_SESSION['username'])) {
                exit();
            } else {
                echo $_SESSION['username'];
            }
            ?>
        </h1>
    </div>
</main>
</body>

</html>