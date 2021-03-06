<?php include('../partials/menu.php'); ?>
 
<div class="main-content">
    <div class="wrapper">
        <h1>File Order</h1>
        <br/><br/>
            <br/>

        <?php

            $id = $_GET['id'];
        ?>


        <form class = "form-style-5" action="" method="POST">
            <table >
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name ="date" placeholder="Enter Date"> </td>
                </tr>

                <tr>
                    <td>Prescribing Doctor</td>
                    <td><select name="dr_name">
                            <option value="Dr. Mike">Dr. Mike</option>
                            <option value="Dr. Teague">Dr. Teague</option>
                            <option value="Dr. Anna">Dr. Anna</option>
                            <option value="Dr. Roshanna">Dr. Roshanna</option>
                        </select>
                </tr>
                <tr>
                    <td>Medicine Name:</td>
                    <td>
                    <select name="med_name">
                            <option value="Atorvastatin">Atorvastatin</option>
                            <option value="Levothyroxine">Levothyroxine</option>
                            <option value="Lisinopril">Lisinopril</option>
                            <option value="Metformin">Metformin</option>
                            <option value="Amlodipine">Amlodipine</option>
                            <option value="Metoprolol">Metoprolol</option>
                            <option value="Albuterol">Albuterol</option>
                            <option value="Omeprazole">Omeprazole</option>
                            <option value="Losartan">Losartan</option>
                            <option value="Simvastatin">Simvastatin</option>
                        </select>
                        </td>
                </tr>
                <tr>
                    <td>Medicine ID:</td>
                    <td><input type="number" name ="med_id" placeholder="Enter medicine ID" value="1" min="1" max="10"> </td>
                </tr>
                
                <tr>
                    <td>Qty (tablets):</td>
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
            <div class="box-3 float-container">
            <img
              src="../../images/med_descriptions.png"
              alt="medicines"
              class="img-responsive img-curve"
            />
          </div>
        </form>
    </div>
          
</div>


<?php include('../partials/footer.php'); ?>

<?php

    $med1Price = 0.23;
    $med2Price = 0.43;
    $med3Price = 0.05;
    $med4Price = 1.3;
    $med5Price = 0.03;
    $med6Price = 0.07;
    $med7Price = 0.13;
    $med8Price = 0.26;
    $med9Price = 0.87;
    $med10Price = 2.37;
    $price;

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

        if ($med_id ==1)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==2)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==3)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==4)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==5)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==6)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==7)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==8)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==9)
        {
            $price = $med1Price * $qty;
        }
        if ($med_id ==10)
        {
            $price = $med1Price * $qty;
        }




        // SQL Query to save the data into database
        $sql = "INSERT INTO prescription SET
            patient_id = '$id',
            med_id = '$med_id',
            date = '$date',
            dr_name= '$dr_name',
            reason = '$reason',
            qty= '$qty',
            med_name = '$med_name',
            price = '$price'
            
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