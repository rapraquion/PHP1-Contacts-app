<?php
    if(isset($_POST['logout'])) {
        session_start();
        unset($_SESSION['username']);
        session_destroy();
        header("location: ./login.php");
    }
?>