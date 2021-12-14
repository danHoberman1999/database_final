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

    $sql = "SELECT price, SUM(price)
            FROM exchange JOIN prescription USING (patient_id)
            GROUP BY price";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $profitPrescriptions = $row['price'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT price, SUM(price)
            FROM exchange JOIN med_goods USING (patient_id)
            GROUP BY price";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $profitMedGoods = $row['price'];
    }
    else
    {
        echo 'Error with PHP';
    }

    $sql = "SELECT price, SUM(price) total FROM
            (
                SELECT price
                FROM exchange JOIN med_goods USING (patient_id)
                GROUP BY price
                UNION ALL
                SELECT price
                FROM exchange JOIN prescription USING (patient_id)
                GROUP BY price

            ) t
            group by price
            ";

    $res = mysqli_query($conn, $sql);

    if($res ==true)
    {
        $row = mysqli_fetch_assoc($res);

        $totalProfit = $row['price'];
        echo $totalProfit;
    }
    else
    {
        echo 'Error with PHP';
    }

?>




<div class="main-content">
            <div class="wrapper">
                <h1>Statistics</h1>
                <br/><br/>
                <br/>
                <h3>Total Pharmacy Profit:</h3>
                <h4><?php echo 'total= $'.$totalProfit?></h4>
                <br/>
                <h3>Total Pharmacy Profit from prescriptions:</h3>
                <h4><?php echo 'total= $'.$profitPrescriptions?></h4>
                <br/>
                <h3>Total Pharmacy Profit from pharmacy goods:</h3>
                <h4><?php echo 'total= $'.$profitMedGoods?></h4>
                <br/>
                <h3>Most chosen Pharmacy:</h3>
                <h4><?php echo 'pharmacy_id= '.$mostCommonPharmacy?></h4>
                <br/>
                <h3>Most commonly prescribed medication:</h3>
                <h4><?php echo 'med_id = '.$mostCommonMedicine?></h4>
                <br/>
                <h3>Most commonly bought good:</h3>
                <h4><?php echo 'item_id = '.$mostCommonGood?></h4>
                <br/>
                <h3>Least chosen Pharmacy:</h3>
                <h4><?php echo 'pharmacy_id= '.$leastCommonPharmacy?></h4>
                <br/>
                <h3>Least commonly prescribed medication:</h3>
                <h4><?php echo 'med_id = '.$leastCommonMedicine?></h4>
                <br/>
                <h3>Least commonly bought good:</h3>
                <h4><?php echo 'item_id = '.$leastCommonGood?></h4>
            </div>
</div>





<?php include('../statistics-partials/footer.php'); ?>