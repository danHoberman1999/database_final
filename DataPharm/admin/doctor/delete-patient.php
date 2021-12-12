<?php 

    //Include constants.php
    include('../../config/constants.php');

    // 1. get the ID of Patient to be deleted
    $id = $_GET['id'];

    // 2. Create SQL Query to Delete Patient
    $sql = "DELETE FROM patient WHERE patient_id = $id";

    //Execute the Query
    $res = mysqli_query($conn, $sql);

    if($res == true)
    {
        header("location: ".SITEURL."admin/doctor/doctor.php");
    }
    else
    {
        header("location: ".SITEURL."admin/doctor/doctor.php");
    }


    // 3. Redirect to Manage Admin page with message




?>