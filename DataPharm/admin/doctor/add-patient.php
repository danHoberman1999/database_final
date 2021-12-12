<?php include('../partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Patient</h1>
        <br/><br/>
            <br/>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>First Name:</td>
                    <td><input type="text" name ="first_name" placeholder="Enter your first name"> </td>
                </tr>

                <tr>
                    <td>Last Name:</td>
                    <td><input type="text" name ="last_name" placeholder="Enter your last name"> </td>
                </tr>
                <tr>
                    <td>Age:</td>
                    <td><input type="text" name ="age" placeholder="Enter your age"> </td>
                </tr>
                <tr>
                    <td>Weight:</td>
                    <td><input type="text" name ="weight" placeholder="Enter your weight"> </td>
                </tr>
                <tr>
                    <td>Sex:</td>
                    <td><input type="text" name ="sex" placeholder="Enter your sex"> </td>
                </tr>
                <tr>
                    <td>Diagnosis:</td>
                    <td><input type="text" name ="diagnosis" placeholder="Enter your diagnosis"> </td>
                </tr>
                <tr>
                    <td>City:</td>
                    <td><input type="text" name ="city" placeholder="Enter your city"> </td>
                </tr>
                <tr>
                    <td>State:</td>
                    <td><input type="text" name ="state" placeholder="Enter your state"> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Patient" class ="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>

<?php

    //Process the value from form and save it in database
    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        // echo "Button Clicked";

        //Get the Data from form

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $weight = $_POST['weight'];
        $sex = $_POST['sex'];
        $diagnosis = $_POST['diagnosis'];
        $city = $_POST['city'];
        $state = $_POST['state'];


        // SQL Query to save the data into database
        $sql = "INSERT INTO patient SET
            first_name = '$first_name',
            last_name= '$last_name',
            age = '$age',
            weight = '$weight',
            sex= '$sex',
            diagnosis = '$diagnosis',
            city = '$city',
            state= '$state'
        ";

        $res = mysqli_query($conn, $sql);


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