<?php
    if(isset($_GET['deletes'])) {
        $data = file('/opt/lampp/htdocs/phpcourse/PHP1-Contacts-app-submission/contacts.txt');
        $search = $_GET['deletes'];

        $out = array();

        foreach($data as $line) {
            if(trim($line) != $search) {
                $out[] = $line;
            }
        }

        $fp = fopen('/opt/lampp/htdocs/phpcourse/PHP1-Contacts-app-submission/contacts.txt', "w+");
        flock($fp, LOCK_EX);
        foreach($out as $line) {
            fwrite($fp, $line);
        }
        flock($fp, LOCK_UN);
        fclose($fp);
    }
?>