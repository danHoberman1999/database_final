<?php include('../partials/menu.php'); ?>
 
<div class="main-content">
    <div class="wrapper">
        <h1>File Order</h1>
        <br/><br/>
            <br/>

        <?php

            $id = $_GET['id'];
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name ="date" placeholder="Enter Date"> </td>
                </tr>

                <tr>
                    <td>Prescribing Doctor</td>
                    <td><input type="text" name ="dr_name" placeholder="Enter prescribing Doctor name"> </td>
                </tr>
                <tr>
                    <td>Medicine Name:</td>
                    <td><input type="text" name ="med_name" placeholder="Enter medicine name"> </td>
                </tr>
                <tr>
                    <td>Medicine ID:</td>
                    <td><input type="text" name ="med_id" placeholder="Enter medicine ID"> </td>
                </tr>
                
                <tr>
                    <td>Qty:</td>
                    <td><input type="number" name ="qty" placeholder="Enter qty prescribed"> </td>
                </tr>

                <tr>
                    <td>Reason for Prescription:</td>
                    <td><input type="text" name ="reason" placeholder="Enter reason for prescription"></td>

                </tr>
                <tr>
                    <td colspan="2">
                        <input type = "hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="File Order" class ="btn-secondary">
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
        $id = $_POST['id'];
        $date = $_POST['date'];
        $dr_name = $_POST['dr_name'];
        $med_name = $_POST['med_name'];
        $med_id = $_POST['med_id'];
        $qty = $_POST['qty'];
        $reason = $_POST['reason'];


        // SQL Query to save the data into database
        $sql = "INSERT INTO prescription SET
            patient_id = '$id',
            med_id = '$med_id',
            date = '$date',
            dr_name= '$dr_name',
            reason = '$reason',
            qty= '$qty',
            med_name = '$med_name'
            
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
            header("location: ".SITEURL."admin/doctor/file-order.php");
        }
    }

?>