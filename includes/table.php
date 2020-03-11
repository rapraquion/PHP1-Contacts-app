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
    <?php $file = fopen("./contacts.txt","r") or die("Error"); ?>
            <?php $parts = array(); ?>
                <?php while (!feof($file) ) { ?>
                    <?php $line= fgets($file); ?>
                    <?php $parts = explode(',', $line); ?>
                        <?php if(isset($parts[1])):  ?>
                            <tr>
                                <td><?php echo $parts[0] ?></td>
                                <td><?php echo $parts[1] ?></td>
                                <td><?php echo $parts[2] ?></td>
                                <td><?php echo $parts[3] ?></td>
                                <td><?php echo $parts[4] ?></td>
                                <td>
                                    <?php echo "<a class='btn btn-outline-danger' style='color: #000; text-decoration: none;' href='./index.php?deletes=".$parts[0].",".$parts[1].",".$parts[2].",".$parts[3].",".$parts[4]." '>Delete</a>"; ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                <?php } ?>
    </tbody>
</table>