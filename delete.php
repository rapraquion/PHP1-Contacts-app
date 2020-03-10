<?php
    require('./db.php');

    if(isset($_POST['delete'])) {
        $deleteId = $_POST['deleteId'];

        $queryDelete = "DELETE FROM contacts WHERE id = $deleteId";
        $sqlDelete = mysqli_query($conn, $queryDelete);

        $data = file("./contacts.txt");
			
			$out = array();
			
			foreach($data as $line) {
				if(trim($line) != $data) {
					$out[] = $line;
				}
			}
			
			$fp = fopen("./contacts.txt", "w+");
			flock($fp, LOCK_EX);
			foreach($out as $line) {
				fwrite($fp, $line);
			}
			flock($fp, LOCK_UN);
			fclose($fp);;

        // $string = "$deletefirstname, \t"."$deletemiddleinitial, \t"."$deletelastname, \t"."$deleteaddress, \t".$deletecontactnumber."\n";
        // $data = file('./contacts.txt');
        // $out = array();
        
        // $delimiters = Array(",",":","|","-");
        // $section = array_filter(explode($delimiters, $string));

        // $file = fopen('./contacts.txt', 'w+');
        // flock($file, LOCK_EX);
        // if(iiset($section[0])) {
        //     foreach($out as $line) {
        //         fwrite($file, $line);
        //     }
        // }
        // fclose($file);

        header('location: ./index.php');
    } else {
        header('location: ./index.php');
    }


     // $DELETE = "line1";

        // $data = file("./contacts.txt");

        // $out = array();

        // foreach($data as $line) {
        //     if(trim($line) != $DELETE) {
        //         $out[] = $line;
        //     }
        // }

        // $fp = fopen("./contacts.txt", "w+");
        // flock($fp, LOCK_EX);
        // foreach($out as $line) {
        //     fwrite($fp, $line);
        // }
        // flock($fp, LOCK_UN);
        // fclose($fp);
?>