<?php include('../pharmacy-partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Final Orders</h1>
                <br/><br/>
                <br/>
                <table class="tbl-full">
                    <tr>
                        <th>Patient ID</th>
                        <th>Total Purchase ($)</th>
                    </tr>

                    <?php 
                        $total;

                        //unsure about this query
                        //$sql = "SELECT e.patient_id, "

                        

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
                                    echo print_r($rows);
                                    //Using while loop to get all the data form database
                                    //And while loop will run as long as we have data in database

                                    //Get individual data
                                    $id = $rows['patient_id'];
                                    $total = $rows['price'] + $rows['price'];

                                    //display the values in our table
                                    ?>
                                        <tr>
                                            <td><?php echo $id.'.' ?></td>
                                            <td><?php echo $total ?></td>
                                            <td>
                                                <a href="https://www.paypal.com/us/home" class="btn-primary">Purchase</a>
                                            </td>
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

<?php include('../pharmacy-partials/footer.php'); ?>