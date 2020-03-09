<?php
    require('./db.php');

    $sort="";
    $column="id";

    if(isset($_GET['column']) && isset($_GET['sort'])){
         $sort = $_GET['sort'];
         $column = $_GET['column'];

         $sort == 'ASC' ? $sort ='DESC' : $sort="ASC";
    }

    $queryContacts = "SELECT * FROM contacts ORDER BY $column $sort";
    $sqlContacts = mysqli_query($conn, $queryContacts);


?>