<?php
    require('./db.php');

    if(isset($_POST['delete'])) {
        $deleteId = $_POST['deleteId'];

        $queryDelete = "DELETE FROM contacts WHERE id = $deleteId";
        $sqlDelete = mysqli_query($conn, $queryDelete);
        
        echo '<script>Sucessfully Created!</script>';
        header('location: ./index.php');
    } else {
        header('location: ./index.php');
    }
?>