<?php include('../pharmacy-partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>View Orders</h1>
                <br/><br/>
                <br/>
                <table class="tbl-full">
                    <tr>
                        <th>Date</th>
                        <th>Prescribing Doctor</th>
                        <th>Medicine Name</th>
                        <th>Medicine ID</th>
                        <th>Qty</th>
                        <th>Reason for Prescription</th>
                    </tr>

                    <?php 
                        // Query to get all Admin
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM prescription WHERE pharmacy_id = $id";
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
                                    $med_id = $rows['med_id'];
                                    $date = $rows['date'];
                                    $dr_name = $rows['dr_name'];
                                    $reason = $rows['reason'];
                                    $qty = $rows['qty'];
                                    $med_name = $rows['med_name'];

                                    //display the values in our table
                                    ?>
                                        <tr>
                                            <td><?php echo $med_id ?></td>
                                            <td><?php echo $date ?></td>
                                            <td><?php echo $dr_name ?></td>
                                            <td><?php echo $reason ?></td>
                                            <td><?php echo $qty ?></td>
                                            <td><?php echo $med_name ?></td>
                                        </tr>

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

<?php include('./pharmacy-partials/footer.php'); ?>