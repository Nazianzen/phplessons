<?php
$pwd = "test1234";

$pwd_hash = password_hash("test123", PASSWORD_DEFAULT);

$pwd_verify = password_verify($pwd, $pwd_hash);
