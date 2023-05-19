<?php
    session_start();
    unset($_SESSION['id'],$_SESSION['email'],$_SESSION['name'],$_SESSION['surname']); 
    session_destroy();
    header("Location: Home.php"); // Redirect to login page
    exit;

?>