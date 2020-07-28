<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];// Array ( [name] => 20200529_133603.jpg [type] => image/jpeg [tmp_name] => /opt/lampp/temp/php1yIksw [error] => 0 [size] => 1381120 ) 

    $file_name = $file['name'];
    $file_type = $file['type'];
    $file_tmp_name = $file['tmp_name'];
    $file_error = $file['error'];
    $file_size = $file['size'];

    $name_seperation = explode('.', $file_name);// Array ( [0] => 20200529_133603 [1] => jpg ) 
    $file_ext = strtolower(end($name_seperation));

    $allowed_extensions = ['jpeg', 'jpg', 'png', 'pdf'];

    if (in_array($file_ext, $allowed_extensions)) {
        if ($file_error === 0) {
            if ($file_size < 2000000) {
                $file_new_name = uniqid("upload").".".$file_ext;
                $file_destination = '../uploads/'.$file_new_name;
                if(move_uploaded_file($file_tmp_name, $file_destination)){
                    header('Location: ../file_upload.php?upload=success');
                } else {
                    echo "Problem uploading file";
                }
            } else {
                echo "File too large.";
            }
        } else {
            echo "Error uploading file.";
        }
    } else {
        echo "Invalid file type.";
    }
}