<?php
    require('./db.php');

    if(isset($_POST['edit'])){
        $editId = $_POST['editId'];
        $editfirstname = $_POST['editfirstname'];
        $editmiddleinitial = $_POST['editmiddleinitial'];
        $editlastname = $_POST['editlastname'];
        $editaddress = $_POST['editaddress'];
        $editcontactnumber = $_POST['editcontactnumber'];
    }

    if(isset($_POST['update'])) {
        $updateId = $_POST['updateId'];
        $updatefirstname = $_POST['updatefirstname'];
        $updatemiddleinitial = $_POST['updatemiddleinitial'];
        $updatelastname = $_POST['updatelastname'];
        $updateaddress = $_POST['updateaddress'];
        $updatecontactnumber = $_POST['updatecontactnumber'];

        $queryUpdate = "UPDATE contacts SET firstname='$updatefirstname', middleinitial='$updatemiddleinitial', lastname='$updatelastname', address='$updateaddress', contactnumber=$updatecontactnumber WHERE id=$updateId";
        $sqlUpdate = mysqli_query($conn, $queryUpdate);

        header('location: ./index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Mini Project - Day 5 - Update</title>
</head>
<body>
    <?php require('./nav.php') ?>
    <div class="main">
        <form class="update-main" action="./update.php" method="POST">
        <h3>Update Contact</h3>
            <div class="form-group">
                <input autofocus required class="form-control form-control-lg" placeholder="First Name" name="updatefirstname" value="<?php echo $editfirstname ?>" type="text">  
            </div>
            <div class="form-group">                               
                <input required class="form-control form-control-lg" placeholder="Middle Initial" name="updatemiddleinitial" value="<?php echo $editmiddleinitial ?>" type="text">  
            </div>
            <div class="form-group">                                    
                <input required class="form-control form-control-lg" placeholder="Last Name" name="updatelastname" value="<?php echo $editlastname ?>" type="text">  
            </div>
            <div class="form-group">                                   
                <input required class="form-control form-control-lg" placeholder="Address" name="updateaddress" value="<?php echo $editaddress ?>" type="text">  
            </div>
            <div class="form-group">                                     
                <input required class="form-control form-control-lg" placeholder="Contact Number" name="updatecontactnumber" value="<?php echo $editcontactnumber ?>" type="number">  
            </div>
            <button type="submit" name="update" class="btn btn-default">Update</button>
            <input type="hidden" name="updateId" value="<?php echo $editId?>" />
        </form>
    </div>  
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>