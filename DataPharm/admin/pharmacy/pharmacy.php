<?php include('../pharmacy-partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Pharmacy Console</h1>
                <br/><br/>
                <br/>
                <table class="content-table">
                    <thead>
                    <tr>
                        <th>Pharmacy ID</th>
                        <th>Pharmacy Name</th>
                        <th>City</th>
                        <th>State</th>
                        <th>View Orders</th>
                    </tr>
                    </thead>

                    <?php 
                        // Query to get all Admin
                        $sql = "SELECT * FROM pharmacy";
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
                                    $id = $rows['pharmacy_id'];
                                    $pharmacy_name = $rows['name'];
                                    $city = $rows['city'];
                                    $state = $rows['state'];

                                    //display the values in our table
                                    ?>
                                    <tbody></tbody>
                                        <tr>
                                            <td><?php echo $id.'.' ?></td>
                                            <td><?php echo $pharmacy_name ?></td>
                                            <td><?php echo $city ?></td>
                                            <td><?php echo $state ?></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?>admin/pharmacy/final-order.php?id=<?php echo $id; ?> " class="btn-primary">View Patients Orders</a>
                                            </td>
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

<?php include('../pharmacy-partials/footer.php'); ?>