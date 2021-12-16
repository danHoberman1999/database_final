<?php include('../pharmacy-partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Final Orders</h1>
                <br/><br/>
                <br/>
                <table class="content-table">
                    <thead>
                    <tr>
                        <th>Patient ID</th>
                        <th>Total Purchase ($)</th>
                        <th>Purchase</th>
                    </tr>
                    </thead>

                    <?php 

                        $id = $_GET['id'];

                        $sql = "SELECT DISTINCT e.patient_id, SUM(DISTINCT (COALESCE(s.price,0))) + SUM(DISTINCT (COALESCE(m.price,0))) AS totalSpent
                        FROM exchange e 
                            JOIN patient p USING (patient_id)
                            LEFT JOIN prescription s ON (p.patient_id = s.patient_id)
                            LEFT JOIN med_goods m ON(s.patient_id = m.patient_id)
                        WHERE e.pharmacy_id = $id
                        GROUP BY e.patient_ID";

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
                                    $total = $rows['totalSpent'];

                                    //display the values in our table
                                    ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $id.'.' ?></td>
                                            <td><?php echo $total ?></td>
                                            <td>
                                                <a href="https://www.paypal.com/us/home" class="btn-primary">Purchase</a>
                                            </td>
                                        </tr>
                                        </tbody>

                                    <?php

                                }
                            }
                            else
                            {
                                //No data in database
                                //echo "No data";
                            }

                        }

                    ?>
                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->

<?php include('../pharmacy-partials/footer.php'); ?>