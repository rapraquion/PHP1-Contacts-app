<?php
    if(isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION["id"]);
        unset($_SESSION["username"]);
        unset($_SESSION["email"]);

        header('location: ./login.php');
        exit();
    }
?>