<?php
  // database connection file
include '../config/config.inc.php';
    // session_start();
	session_destroy();
    //2. REdirect to Login Page
    header('location:../');
    exit();
?> 