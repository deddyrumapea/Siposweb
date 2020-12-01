<?php


session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('siposid', '', time() -3600);

header("Location: index.php");
exit();

?>