<?php include ('../pharmacy-partials/menu.php'); ?>
        <!-- Menu Section Ends -->

        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Choose Pharmacy</h1>
                <br/><br/>
                <br/>
                    <?php
$id = $_GET['id'];
$sql = "SELECT * FROM patient WHERE patient_id = $id";
$res = mysqli_query($conn, $sql);

if ($res == true)
{
    $count = mysqli_num_rows($res);
    if ($count == 1)
    {
        $row = mysqli_fetch_assoc($res);
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $city = $row['city'];
        $state = $row['state'];
    }
    else
    {
        header("location: " . SITEURL . "admin/doctor/doctor.php");
    }
}

?>
                <table class="tbl-full">
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>City</th>
                        <th>State</th>
                    </tr>
                    <tr>
                        <td><?php echo $first_name ?></td>
                        <td><?php echo $last_name ?></td>
                        <td><?php echo $city ?></td>
                        <td><?php echo $state ?></td>
                    </tr>
                </table>
                <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Pharmacy ID:</td>
                    <td><input type="number" name ="pharmacy_id" placeholder="Enter pharmacy ID" value="1" min="1" max="18"> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type = "hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="File Order" class ="btn-secondary">
                    </td>
                </tr>
            </table>
            <div class="box-3 float-container">
            <img
              src="../../images/pharmacy-info.png"
              alt="pharmacy-info"
              class="img-responsive img-curve"
            />
          </div>
        </form>
            </div>
        </div>
        <!-- Main Content Section Ends -->

        <!-- Need to create all these pharmacies in pharmacy already. Then I need to add this information to exchange. -->

<?php include ('../pharmacy-partials/footer.php'); ?>


<?php

    //Process the value from form and save it in database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        // echo "Button Clicked";

        //Get the Data from form
        $patient_id = $_POST['id'];
        $pharmacy_id = $_POST['pharmacy_id'];


        // SQL Query to save the data into database
        $sql = "INSERT INTO exchange SET
            pharmacy_id = '$pharmacy_id',
            patient_id = '$patient_id'
        ";


        $res = mysqli_query($conn, $sql);



        // Check whether the data is inserted or not 

        if($res ==True)
        {
            //Data Inserted
            //Redirect Page
            header("location: ".SITEURL."admin/pharmacist/pharmacist.php");
        }
        else
        {
            //Failed to insert Data
            //Redirect Page
            header("location: ".SITEURL."admin/pharmacist/choose-pharmacy.php");
        }
    }

?>