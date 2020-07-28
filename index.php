<?php
include 'header.php';
include_once 'scripts/db_connect.php';
?>
<main>
    <div>

        <form action="scripts/sign_up.php" method="POST">
            <?php
            
            if(!isset($_GET['uname'])){
                echo '<input type="text" name="uname" placeholder="Username"> <br>';
            } else {
                $uname = $_GET['uname'];
                echo '<input type="text" name="uname" placeholder="Username" value="'.$uname.'"> <br>';
            }
            if(!isset($_GET['email'])){
                echo '<input type="text" name="email" placeholder="E-mail"> <br>';
            } else {
                $email = $_GET['email'];
                echo '<input type="text" name="email" placeholder="E-mail" value="'.$email.'"> <br>';
            }

            ?>
            <input type="password" name="pass" placeholder="Password">
            <br>
            <br>
            <button type="submit" name="submit">Submit</button>
        </form>

        <?php
        
        if (!isset($_GET['signup'])) {
            exit();
        } else {
            $signup_check = $_GET['signup'];

            switch($signup_check){
                case 'empty':
                    echo "<p class='error'>Fields cannot be blank.</p>";
                break;
                case 'invalid_email':
                    echo "<p class='error'>Invalid email.</p>";
                break;
                case 'sql_error':
                    echo "<p class='error'>Invalid input(s).</p>";
                break;
                case 'username_taken':
                    echo "<p class='error'>Sorry, username already exists. Choose another.</p>";
                break;
                case 'success':
                    echo "<p class='success'>Successfully signed up.</p>";
                break;
            }
        }

        ?>

    </div>
</main>
</body>

</html>