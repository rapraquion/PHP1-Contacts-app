<?php
    if(isset($_GET['deletes'])) {
        $DELETE = $_GET['deletes'];

        $data = file("./contacts.txt");

        $out = array();

        foreach($data as $line) {
            if(trim($line) != $DELETE) {
                $out[] = $line;
            }
        }

        $fp = fopen("./contacts.txt", "w+");
        flock($fp, LOCK_EX);
        foreach($out as $line) {
            fwrite($fp, $line);
        }
        flock($fp, LOCK_UN);
        fclose($fp);  
        header('location: index.php');
    } else {
        header('location: index.php');
    }
?>