<?php include('../partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Patient Console</h1>
                <br/><br/>
                <br/>
                <a href="http://localhost/DataPharm/admin/doctor/add-patient.php" class="btn-primary">Add Patient</a>
                <br/><br/><br/>
                <table class="content-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Update</th>
                        <th>Info</th>
                        <th>Order</th>
                        <th>Delete</th>
                    </tr>
                </thead>

                    <?php 
                        // Query to get all Admin
                        $sql = "SELECT * FROM patient";
                        // Execut the Query
                        $res = mysqli_query($conn, $sql);
                        //check whether the Query is Executed or not
                        if($res == TRUE)
                        {
                            // Count Rows to Check whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database
                            //Check the num of rows
                            if($count>0)
                            {
                                // We have data in database
                                while($rows = mysqli_fetch_assoc($res))
                                {
                                    //Using while loop to get all the data form database
                                    //And while loop will run as long as we have data in database

                                    //Get individual data
                                    $id = $rows['patient_id'];
                                    $first_name = $rows['first_name'];
                                    $last_name = $rows['last_name'];
                                    $sex = $rows['sex'];
                                    $age = $rows['age'];

                                    //display the values in our table
                                    ?>
                                        <tbody>
                                        <tr>
                                            <td><?php echo $id.'.' ?></td>
                                            <td><?php echo $first_name ?></td>
                                            <td><?php echo $last_name ?></td>
                                            <td><?php echo $sex ?></td>
                                            <td><?php echo $age ?></td>
                                            <td><a href="<?php echo SITEURL; ?>admin/doctor/update-patient.php?id=<?php echo $id; ?> " class="btn-primary">Update Info</a></td>
                                            <td><a href="<?php echo SITEURL; ?>admin/doctor/more-info-patient.php?id=<?php echo $id; ?>" class="btn-secondary">More Info</a></td>
                                            <td><a href="<?php echo SITEURL; ?>admin/doctor/file-order.php?id=<?php echo $id; ?>" class="btn-dark">File Order</a></td>
                                            <td> <a href="<?php echo SITEURL; ?>admin/doctor/delete-patient.php?id=<?php echo $id; ?> " class="btn-danger">Delete Info</a></td>
                                                
                                            
                                        </tr>
                                        </tbody>

                                    <?php

                                }
                            }
                            else
                            {
                                //No data in database
                                echo "No data";
                            }

                        }

                    ?>
                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->

        <?php include('../partials/footer.php'); ?>