<?php

require('./db.php');

$errors = array();
$username = "";
$email = "";

// Login handler
if(isset($_POST["login-btn"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    //validation
    if(empty($username)) {
        $errors["username"] = "Username required";
    }

    if(empty($password)) {
        $errors["password"] = "Password required";
    }

    if(count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    
        if(password_verify($password, $user["password"])) {
            $_SESSION["id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];
            header("location: ./index.php");
            exit();
        } else {
            $errors["login_fail"] = "Invalid credentials";
        }
    }
}

// Register handler
if(isset($_POST['signup-btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    //validation
    if(empty($username)){
        $errors['username'] = 'Username required';
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors['email'] = 'Invalid Email address';
    }
    if(empty($email)){
        $errors['email'] = 'Email required';
    }
    if(empty($password)){
        $errors['password'] = 'Password required';
    }
    if($password !== $passwordConf) {
        $errors['password'] = "Password didn't match";
    }

    $query = "SELECT * FROM users WHERE email=? LIMIT 1";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if($userCount > 0) {
        $errors['email'] = "Email already Exists";
    }

    if(count($errors) === 0){
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);
        if($stmt->execute()) {
            $user_id = $conn->insert_id;
            $_SESSION["id"] = $user_id;
            $_SESSION["username"] = $username;
            $_SESSION["email"] = $email;

            header("location: ./index.php");
            exit();
        } else {
            $errors["db_error"] = "Failed to register";
        }
    }    
} 