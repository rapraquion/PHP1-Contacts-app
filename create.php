<?php

require('./db.php');

if(isset($_POST['newcontact'])) {
    $firstname = $_POST['firstname'];
    $middleinitial = $_POST['middleinitial'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $contactnumber = $_POST['contactnumber'];

    $queryCreate = "INSERT INTO contacts VALUES (`$firstname`,`$middleinitial`,`$lastname`,`$address`, $contactnumber )";
    $sqlCreate = mysqli_query($conn, $queryCreate);

    $filename = "contacts.txt";
    $head = "ID \t"."First Name \t"."MI \t"."Last Name \t"."Address \t"."Contact No. \n";
    $contacts = "$firstname \t"."$middleinitial \t"."$lastname \t"."$address \t".$contactnumber."\n";
    file_put_contents($filename, $contacts, FILE_APPEND);  
    
    header("location: index.php");
}
?>