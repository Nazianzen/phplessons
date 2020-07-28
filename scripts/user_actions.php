<?php

/*
========Super globals========
$GLOBALS
$_GET
$_POST
$_COOKIE
$_SESSION
*/

setcookie('name', 'value', time() + 86400);

$_SESSION['name'] = "value";

?>