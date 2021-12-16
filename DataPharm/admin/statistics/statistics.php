<?php include('../statistics-partials/menu.php'); ?>

<?php

    $sql = "SELECT item_id, COUNT(item_id) AS top_occurence FROM med_goods GROUP BY item_id ORDER BY top_occurence DESC LIMIT 1";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $mostCommonGood = $row['item_id'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT med_id, COUNT(med_id) AS top_occurence FROM prescription GROUP BY med_id ORDER BY top_occurence DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $mostCommonMedicine = $row['med_id'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT pharmacy_id, COUNT(pharmacy_id) AS top_occurence FROM exchange GROUP BY pharmacy_id ORDER BY top_occurence DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $mostCommonPharmacy = $row['pharmacy_id'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT item_id, COUNT(item_id) AS least_occurence FROM med_goods GROUP BY item_id ORDER BY least_occurence ASC LIMIT 1";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $leastCommonGood = $row['item_id'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT med_id, COUNT(med_id) AS least_occurence FROM prescription GROUP BY med_id ORDER BY least_occurence ASC LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $leastCommonMedicine = $row['med_id'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT pharmacy_id, COUNT(pharmacy_id) AS least_occurence FROM exchange GROUP BY pharmacy_id ORDER BY least_occurence ASC LIMIT 1";
    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $leastCommonPharmacy = $row['pharmacy_id'];
    }
    else
    {
        echo 'Error with PHP';
    }


    $sql = "SELECT p.patient_id, MAX(COALESCE(s.price,0) + COALESCE(m.price,0)) AS amountSpent
    FROM patient p 
            JOIN prescription s USING (patient_id)
            JOIN med_goods m USING (patient_id)
    GROUP BY p.patient_id
    ORDER BY amountSpent DESC
    LIMIT 1";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $maxSpentPatientId = $row['patient_id'];
        $maxSpentPatientAmount = $row['amountSpent'];
        
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT m.patient_id, MAX(m.price) AS amountSpent
    FROM med_goods m
    GROUP BY m.patient_id
    ORDER BY amountSpent DESC
    LIMIT 1";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $maxSpentMedGoodsId = $row['patient_id'];
        $maxSpentMedGoodsAmount = $row['amountSpent'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT p.patient_id, MAX(p.price) AS amountSpent
    FROM prescription p
    GROUP BY p.patient_id
    ORDER BY amountSpent DESC
    LIMIT 1";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $maxSpentPharmacyId = $row['patient_id'];
        $maxSpentPharmacyAmount = $row['amountSpent'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT COUNT(p.patient_id) AS numJustPrescription
    FROM patient p
        JOIN prescription s USING(patient_id)
        LEFT JOIN med_goods m ON(s.patient_id = m.patient_id)
    WHERE m.price IS NULL";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $numPrescription = $row['numJustPrescription'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT COUNT(p.patient_id) AS numJustGoods
    FROM patient p
        JOIN med_goods m USING(patient_id)
        LEFT JOIN prescription s ON(s.patient_id = m.patient_id)
    WHERE s.price IS NULL";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $numGoods = $row['numJustGoods'];
    }
    else
    {
        echo 'Error with PHP';
    }


?>




<div class="statistics-page">
            <div class="wrapper">
                <h1>Statistics</h1>
                <br/><br/>
                <br/>
                <h3>Number of patients who only spent money on prescriptions:</h3>
                <ul><li><?php echo 'count = '.$numPrescription?></li></ul>
                <br/>
                <h3>Number of patients who only spent money on pharmacy goods:</h3>
                <ul><li><?php echo 'count = '.$numGoods?></li></ul>
                <br/>
                <h3>Most spent by patient:</h3>
                <ul><li><?php echo 'patient_id = '.$maxSpentPatientId.' total= $'.$maxSpentPatientAmount?></li></ul>
                <br/>
                <h3>Most spent on pharmacy goods: </h3>
                <ul><li><?php echo 'patient_id = '.$maxSpentMedGoodsId.' total= $'.$maxSpentMedGoodsAmount?></li></ul>
                <br/>
                <h3>Most spent on prescription goods:</h3>
                <ul><li><?php echo 'patient_id = '.$maxSpentPharmacyId.' total= $'.$maxSpentPharmacyAmount?></li></ul>
                <br/>
                <h3>Most chosen Pharmacy:</h3>
                <ul><li><?php echo 'pharmacy_id= '.$mostCommonPharmacy?></li></ul>
                <br/>
                <h3>Most commonly prescribed medication:</h3>
                <ul><li><?php echo 'med_id = '.$mostCommonMedicine?></li></ul>
                <br/>
                <h3>Most commonly bought good:</h3>
                <ul><li><?php echo 'item_id = '.$mostCommonGood?></li></ul>
                <br/>
                <h3>Least chosen Pharmacy:</h3>
                <ul><li><?php echo 'pharmacy_id= '.$leastCommonPharmacy?></li></ul>
                <br/>
                <h3>Least commonly prescribed medication:</h3>
                <ul><li><?php echo 'med_id = '.$leastCommonMedicine?></li></ul>
                <br/>
                <h3>Least commonly bought good:</h3>
                <ul><li><?php echo 'item_id = '.$leastCommonGood?></li></ul>
            </div>
</div>





<?php include('../statistics-partials/footer.php'); ?>