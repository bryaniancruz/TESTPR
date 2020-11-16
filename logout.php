<?php 
session_start();
unset($_SESSION['fullname']);
unset($_SESSION['Department']);
unset($_SESSION['role']);
header("location: ../PR/");
?>