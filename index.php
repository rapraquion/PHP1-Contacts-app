<?php
    require('./read.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Mini Project - Day 5 - Home</title>
</head>
<body>
    <?php include('./nav.php') ?>
    
    <div class="main">
        <form class="create-main" action="./create.php" method="post">
        <h3>Create Contact</h3>  
            <input autofocus type="text" name="firstname" placeholder="First Name" required />
            <input type="text" name="middleinitial" placeholder="Middle Initial" required />
            <input type="text" name="lastname" placeholder="Last Name" required />
            <input type="text" name="address" placeholder="Address" required />
            <input type="number" name="contactnumber" placeholder="Contact Number" required />
            <input type="submit" name="newcontact" value="CREATE" />
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col"><a href="?column=id&sort=<?php echo $sort?>">No.</a></th>
                <th scope="col"><a href="?column=firstname&sort=<?php echo $sort?>">First Name</a></th>
                <th scope="col"><a href="?column=middleinitial&sort=<?php echo $sort?>">Middle Initial</a></th>
                <th scope="col"><a href="?column=lastname&sort=<?php echo $sort?>">Last Name</a></th>
                <th scope="col"><a href="?column=address&sort=<?php echo $sort?>">Address</a></th>
                <th scope="col">Contact Number</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($results = mysqli_fetch_array($sqlContacts)) { ?>
                <tr>
                <th scope="row"><?php echo $results['id'] ?></th>
                        <td><?php echo $results['firstname'] ?></td>
                        <td><?php echo $results['middleinitial'] ?></td>
                        <td><?php echo $results['lastname'] ?></td>
                        <td><?php echo $results['address'] ?></td>
                        <td><?php echo $results['contactnumber'] ?></td>
                        <td>
                            <form action="./update.php" method="post">
                                <input type="submit" name="edit" value="Edit" />
                                <input type="hidden" name="editId" value=<?php echo $results['id'] ?> />
                                <input type="hidden" name="editfirstname" value=<?php echo $results['firstname'] ?> /> 
                                <input type="hidden" name="editmiddleinitial" value=<?php echo $results['middleinitial'] ?> /> 
                                <input type="hidden" name="editlastname" value=<?php echo $results['lastname'] ?> /> 
                                <input type="hidden" name="editaddress" value=<?php echo $results['address'] ?> />    
                                <input type="hidden" name="editcontactnumber" value=<?php echo $results['contactnumber'] ?> /> 
                            </form>
                            <form action="./delete.php" method="post">
                                <input type="submit" name="delete" value="Delete" />
                                <input type="hidden" name="deleteId" value=<?php echo $results['id'] ?> />
                            </form>
                        </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>  
<!-- jQuery, Popper.js, Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>