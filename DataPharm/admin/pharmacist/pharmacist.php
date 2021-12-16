<?php include('../pharmacy-partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Pharmacist Console</h1>
                <br/><br/>
                <br/>
                <table class="content-table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>View Orders</th>
                        <th>Pharmacy Purchase</th>
                        <th>Choose Pharmacy</th>
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
                                            <td><a href="<?php echo SITEURL; ?>admin/pharmacist/view-orders.php?id=<?php echo $id; ?> " class="btn-primary">View Med Orders</a></td>
                                            <td><a href="<?php echo SITEURL; ?>admin/pharmacist/goods-purchase.php?id=<?php echo $id; ?> " class="btn-secondary">Make Pharmacy Purchase</a></td>
                                            <td><a href="<?php echo SITEURL; ?>admin/pharmacist/choose-pharmacy.php?id=<?php echo $id; ?>" class="btn-danger">Choose Pharmacy</a>  </td>
                                                
                                                
                                                
                                        
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

        <?php include ('../pharmacy-partials/footer.php'); ?>