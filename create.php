<?php

require('./db.php');

if(isset($_POST['newcontact'])) {
    $firstname = $_POST['firstname'];
    $middleinitial = $_POST['middleinitial'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contactnumber = $_POST['contactnumber'];

    $queryCreate = "INSERT INTO contacts VALUES (null, '".$firstname."','".$middleinitial."','".$lastname."','".$address."', $contactnumber )";
    $sqlCreate = mysqli_query($conn, $queryCreate);
    if($sqlCreate){
        $filename = "contacts.txt";
        $contacts = "$firstname,"."$middleinitial,"."$lastname,"."$address,".$contactnumber."\n";
        file_put_contents($filename, $contacts, FILE_APPEND);  
        
        header("location: index.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>