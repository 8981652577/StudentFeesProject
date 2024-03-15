<?php

// setcookie("userCPC",""); // how to delete the cookies
session_start();
session_unset();
session_destroy();

header("location:login.php");
?>