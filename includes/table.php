<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col"><a href="?column=firstname&sort=<?php echo $sort?>" style="text-decoration: none">First Name</a></th>
            <th scope="col"><a href="?column=middleinitial&sort=<?php echo $sort?>" style="text-decoration: none">Middle Initial</a></th>
            <th scope="col"><a href="?column=lastname&sort=<?php echo $sort?>" style="text-decoration: none">Last Name</a></th>
            <th scope="col"><a href="?column=address&sort=<?php echo $sort?>" style="text-decoration: none">Address</a></th>
            <th scope="col">Contact Number</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while($results = mysqli_fetch_array($sqlContacts)) { ?>
            <?php if($results < 0): ?>
                <tr>
                    <th scope="row">
                        <?php echo "#" ?>
                    </th>
                    <td colspan="5"><?php echo "No Data Found"; ?></td>
                </tr>
                <?php else: ?>
                    <tr>
                        <td><?php echo $results['firstname'] ?></td>
                        <td><?php echo $results['middleinitial'] ?></td>
                        <td><?php echo $results['lastname'] ?></td>
                        <td><?php echo $results['address'] ?></td>
                        <td><?php echo $results['contactnumber'] ?></td>
                        <td>
                            <!-- <form action="./update.php" method="post">
                                <button type="submit" name="edit" class="btn btn-info">Edit</button>
                                <input type="hidden" name="editId" value=<?php echo $results['id'] ?> />
                                <input type="hidden" name="editfirstname" value=<?php echo $results['firstname'] ?> /> 
                                <input type="hidden" name="editmiddleinitial" value=<?php echo $results['middleinitial'] ?> /> 
                                <input type="hidden" name="editlastname" value=<?php echo $results['lastname'] ?> /> 
                                <input type="hidden" name="editaddress" value=<?php echo $results['address'] ?> />    
                                <input type="hidden" name="editcontactnumber" value=<?php echo $results['contactnumber'] ?> /> 
                            </form> -->
                            <form action="./delete.php" method="post">
                                <button type="submit" name="delete" class="btn btn-danger">Delete</button>
                                <input type="hidden" name="deleteId" value=<?php echo $results['id'] ?> />
                                <!-- <input type="hidden" name="deletefirstname" value=<?php echo $results['firstname'] ?> />
                                <input type="hidden" name="deletemiddleinitial" value=<?php echo $results['middleinitial'] ?> />
                                <input type="hidden" name="deletelastname" value=<?php echo $results['lastname'] ?> />
                                <input type="hidden" name="deleteaddress" value=<?php echo $results['address'] ?> />
                                <input type="hidden" name="deletecontactnumber" value=<?php echo $results['contactnumber'] ?> /> -->
                            </form>
                        </td>
                    </tr>
            <?php endif ?>
        <?php } ?>
    </tbody>
</table>