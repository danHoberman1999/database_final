<?php include('../partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="content-table">
            <div class="wrapper">
                <h1>Patient Info</h1>
                <br/><br/>
                <?php

                    $id = $_GET['id'];
                    $sql="SELECT * FROM patient WHERE patient_id = $id";
                    $res = mysqli_query($conn, $sql);

                    if($res ==true)
                    {
                        $count = mysqli_num_rows($res);
                        if($count ==1)
                        {
                            $row = mysqli_fetch_assoc($res);
                            $first_name = $row['first_name'];
                            $last_name = $row['last_name'];
                            $age = $row['age'];
                            $weight = $row['weight'];
                            $sex = $row['sex'];
                            $diagnosis = $row['diagnosis'];
                            $city = $row['city'];
                            $state = $row['state'];
                        }
                        else
                        {
                            header("location: ".SITEURL."admin/doctor/doctor.php");
                        }
                    }


                ?>
                <table class="tbl-full">
                    <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Age</th>
                        <th>Weight</th>
                        <th>Sex</th>
                        <th>Diagnosis</th>
                        <th>City</th>
                        <th>State</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><?php echo $first_name ?></td>
                        <td><?php echo $last_name ?></td>
                        <td><?php echo $age ?></td>
                        <td><?php echo $weight ?></td>
                        <td><?php echo $sex ?></td>
                        <td><?php echo $diagnosis ?></td>
                        <td><?php echo $city ?></td>
                        <td><?php echo $state ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Main Content Section Ends -->

        <?php include('../partials/footer.php'); ?>