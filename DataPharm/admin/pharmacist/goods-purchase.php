<?php include('../partials/menu.php'); ?>
 
<div class="main-content">
    <div class="wrapper">
        <h1>Goods Purchase</h1>
        <br/><br/>
            <br/>

        <?php

            $id = $_GET['id'];
        ?>
        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Item_Name:</td>
                    <td><input type="text" name ="item_name" placeholder="Enter Item Name"> </td>
                </tr>

                <tr>
                    <td>Item_ID</td>
                    <td><input type="number" name ="item_id" placeholder="Enter Item ID" value="1" min="1" max="15"> </td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name ="date" placeholder="Enter date"> </td>
                </tr>
                <tr>
                    <td>Qty:</td>
                    <td><input type="number" name ="qty" placeholder="Enter qty Purchased"> </td>
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
              src="../../images/pharmacy-goods.png"
              alt="pharmacy-goods"
              class="img-responsive img-curve"
            />
          </div>
        </form>
    </div>
          
</div>


<?php include ('../pharmacy-partials/footer.php'); ?>

<?php

    $good1Price = 3.99;
    $good2Price = 17.99;
    $good3Price = 4.99;
    $good4Price = 6.99;
    $good5Price = 23.99;
    $good6Price = 9.99;
    $good7Price = 33.99;
    $good8Price = 13.33;
    $good9Price = 20.99;
    $good10Price = 12.50;
    $good11Price = 16.99;
    $good12Price = 2.99;
    $good13Price = 8.99;
    $good14Price = 49.99;
    $good15Price = 7.99;

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
        $item_name = $_POST['item_name'];
        $item_id = $_POST['item_id'];
        $qty = $_POST['qty'];

        if ($item_id ==1)
        {
            $price = $good1Price * $qty;
        }
        if ($item_id ==2)
        {
            $price = $good2Price * $qty;
        }
        if ($item_id ==3)
        {
            $price = $good3Price * $qty;
        }
        if ($item_id ==4)
        {
            $price = $good4Price * $qty;
        }
        if ($item_id ==5)
        {
            $price = $good5Price * $qty;
        }
        if ($item_id ==6)
        {
            $price = $good6Price * $qty;
        }
        if ($item_id ==7)
        {
            $price = $good7Price * $qty;
        }
        if ($item_id ==8)
        {
            $price = $good8Price * $qty;
        }
        if ($item_id ==9)
        {
            $price = $good9Price * $qty;
        }
        if ($item_id ==10)
        {
            $price = $good10Price * $qty;
        }
        if ($item_id ==11)
        {
            $price = $good11Price * $qty;
        }
        if ($item_id ==12)
        {
            $price = $good12Price * $qty;
        }
        if ($item_id ==13)
        {
            $price = $good13Price * $qty;
        }
        if ($item_id ==14)
        {
            $price = $good14Price * $qty;
        }
        if($item_id ==15)
        {
            $price = $good15Price* $qty;
        }

        echo $price;




        // SQL Query to save the data into database
        $sql = "INSERT INTO med_goods SET
            patient_id = '$id',
            item_id = '$item_id',
            item_name = '$item_name',
            date = '$date',
            qty= '$qty',
            price = '$price'
            
        ";

        echo $sql;


        $res = mysqli_query($conn, $sql);


        // Check whether the data is inserted or not 

        if($res ==True)
        {
            //Data Inserted
            //Redirect Page
            //header("location: ".SITEURL."admin/pharmacist/pharmacist.php");
        }
        else
        {
            echo 'failed';
            //Failed to insert Data
            //Redirect Page
            //header("location: ".SITEURL."admin/pharmacist/goods-purchase.php");
        }
    }

?>