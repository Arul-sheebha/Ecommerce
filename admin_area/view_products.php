<?php
include("../includes/connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!--bootstrap css link-->
      <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <!--bootstrap js link-->
        <script defer src="../js/bootstrap.bundle.min.js"></script>
        <!--css file-->
        <link rel="stylesheet" href="./design.css">
</head>
<body>
<h3 class="text-center text-success">All Products</h3>
<table class="table table-bordered text-center mt-5">
    <thead class="text-center bg-info mt-5">
        <tr class="text-center bg-info">
            <th class="text-center bg-info">product ID</th>
            <th class="text-center bg-info">product title</th>
            <th class="text-center bg-info">product image</th>
            <th class="text-center bg-info">product price</th>
            <th class="text-center bg-info">total sold</th>
            <th class="text-center bg-info">status</th>
            <th class="text-center bg-info">edit</th>
            <th class="text-center bg-info">delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-center">
        <?php
        $select="select * from `products`";
        $result=mysqli_query($con,$select);
        $number=0;
        while($row=mysqli_fetch_array($result))
        {
            $number++;
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image1=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            ?>
            <tr>
                <td class='bg-secondary text-light text-center'>
                    <?php echo $number ?></td>
                    <td class='bg-secondary text-light text-center'>
                        <?php echo $product_title ?></td>
                        <td class='bg-secondary text-light text-center'>
                            <img src='./product_images/<?php echo $product_image1?>'style='width:100px;
                            object-fit:contain;'></td>
                            <td class='bg-secondary text-light text-center'>
                                <?php echo $product_price ?>/-</td>
                                <td class='bg-secondary text-light text-center'>
                                    <?php

                                        $select_sold="select * from `orders_pending` where product_id=$product_id";
                                        $result_sold=mysqli_query($con,$select_sold);
                                        $row_sold=mysqli_num_rows($result_sold);
                                        echo $row_sold;?>
                                </td>
                                <td class='bg-secondary text-light text-center'>
                                    <?php echo $status ?></td>
                                    <td class='bg-secondary text-light text-center'>
                                        <a class="text-decoration-none text-light" 
                                        href="index.php?edit_products=<?php echo $product_id;?>">Edit</a></td>
                                    <td class='bg-secondary text-center text-light'><a href="index.php?delete_products=
                                    <?php echo $product_id;?>" class="text-light text-decoration-none">
                                    Delete</a></td>
        <?php
        }
        ?>
        </tbody>
    </table>
</body>
</html>
