<?php include('../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Patient</h1>
        <br/><br/>
            <br/>

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
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name ="first_name" value="<?php echo $first_name; ?>"> </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name ="last_name" value="<?php echo $last_name; ?>"> </td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td><input type="text" name ="age" value="<?php echo $age; ?>"> </td>
                </tr>
                <tr>
                    <td>Weight:</td>
                    <td><input type="text" name ="weight" value="<?php echo $weight; ?>"> </td>
                </tr>
                <tr>
                    <td>Sex:</td>
                    <td><input type="text" name ="sex" value="<?php echo $sex; ?>"> </td>
                </tr>
                <tr>
                    <td>Diagnosis:</td>
                    <td><input type="text" name ="diagnosis" value="<?php echo $diagnosis; ?>"> </td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name ="city" value="<?php echo $city; ?>"> </td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><input type="text" name ="state" value="<?php echo $state; ?>"> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type = "hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Patient" class ="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('../partials/footer.php'); ?>

<?php

    //Process the value from form and save it in database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        // echo "Button Clicked";

        //Get the Data from form
        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $sex = $_POST['sex'];
        $diagnosis = $_POST['diagnosis'];
        $city = $_POST['city'];
        $state = $_POST['state'];


        // SQL Query to save the data into database
        $sql = "UPDATE patient SET
            first_name = '$first_name',
            last_name= '$last_name',
            age = '$age',
            weight = '$weight',
            sex= '$sex',
            diagnosis = '$diagnosis',
            city = '$city',
            state= '$state'
            WHERE patient_id='$id'
        ";


        $res = mysqli_query($conn, $sql);

        echo $sql;


        // Check whether the data is inserted or not 

        if($res ==True)
        {
            //Data Inserted
            //Redirect Page
            header("location: ".SITEURL."admin/doctor/doctor.php");
        }
        else
        {
            //Failed to insert Data
            //Redirect Page
            header("location: ".SITEURL."admin/doctor/add-patient.php");
        }
    }

?>