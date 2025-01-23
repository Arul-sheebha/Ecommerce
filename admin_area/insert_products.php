<?php

include("../includes/connect.php");
if(isset($_POST['insert_product']))
{
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keywords=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status='true';
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $product_image1_tmp=$_FILES['product_image1']['tmp_name'];
    $product_image2_tmp=$_FILES['product_image2']['tmp_name'];
    $product_image3_tmp=$_FILES['product_image3']['tmp_name'];

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or 
    $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='')
    {
        echo "<script>alert('please fill all the available details')</script>";
        
    }
    elseif($product_price>0)
    {
        mysqli_report(MYSQLI_REPORT_ERROR);
        try{
            
        move_uploaded_file($product_image1_tmp,"./product_images/$product_image1");
        move_uploaded_file($product_image2_tmp,"./product_images/$product_image2");
        move_uploaded_file($product_image3_tmp,"./product_images/$product_image3");
        $insert_product="insert into `products` (product_title,
        product_description,product_keywords,category_id,brand_id,
        product_image1,product_image2,product_image3,product_price,date,status) values('$product_title',
        '$product_description','$product_keywords',
        '$product_category','$product_brand','$product_image1','$product_image2',
        '$product_image3','$product_price',NOW(),'$product_status')";
        $result_product=mysqli_query($con,$insert_product);
        if($result_product)
        {
            echo"<script>alert('product inserted successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
    catch(mysqli_sql_exception $e)
    {
        error_log($e->_toString);
    }

    }
}



?>
<html>
    <head>
        <title>ecommerce</title>
        <!--bootstrap css link-->
        <link rel="stylesheet" href="../css/bootstrap.min.css"/>
        <!--bootstrap js link-->
        <script defer src="../js/bootstrap.bundle.min.js"></script>
        <!--css file-->
        <link rel="stylesheet" href="design.css">
</head>
<body class="bg-light" background="../images/boat.jpg" style="background-repeat: no-repeat; background-size: cover;">
    <div class="container">
        <h1 class="text-center m-2">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!--product_title-->
            <div class="form-outline w-50 mt-4 p-3 m-auto">
                <label for="product_title" name="product_title" id="product_title" class="form-label">Product Title</label>
                <input type="text" placeholder="Enter Product Title" name="product_title"
                 id="product_title" autocomplete="off" required="required"
                 class="form-control">
</div>
<!--product description-->
<div class="form-outline w-50 p-3 m-auto">
    <label for="product_description" name="product_description" id="product_description" class="form_label">
        Product Description</label>
        <input type="text" placeholder="Enter Product Description" name="product_description" id="product_description"
         autocomplete="off" required="required" class="form-control">
</div>
<!--product_keyword-->
<div class="form-outline w-50 p-3 m-auto">
    <label for="product_keyword" name="product_keyword" id="product_keyword" class="form-label">Product Keyword</label>
    <input type="text" placeholder="Enter Product Keyword" name="product_keyword" id="product_keyword"
    autocomplete="off" required="required" class="form-control">
</div>
<!--product_category-->
<div class="form-outline w-50 p-3 m-auto">
    <select name="product_category" id="product_category" class="form-select" required="required">
        <option value="">Select a Category
    


        <?php
        $select_category="select * from `categories`";
        $result_category=mysqli_query($con,$select_category);
        while($row_category=mysqli_fetch_assoc($result_category))
        {
            $category_id=$row_category['category_id'];
            $category_title=$row_category['category_title'];
            echo "<option value='$category_id'>$category_title</option>";
        }
        ?>
        </option>
</select>
    </div>
    <!--product_brand-->
    <div class="form-outline w-50 p-3 m-auto">
        <select name="product_brand" id="product_brand" class="form-select"
        required="required">
        <option value="">Select a Brand</option>
        
        
        
        
        <?php
        $select_brand="select * from `brand`";
        $result_brand=mysqli_query($con,$select_brand);
        while($row_brand=mysqli_fetch_assoc($result_brand))
        {
            $brand_id=$row_brand['brand_id'];
            $brand_title=$row_brand['brand_title'];
            echo "<option value='$brand_id'>$brand_title</option>";
        }
        ?>
        </select>
    </div>
    <!--product_image1-->
    <div class="form-outline w-50 p-3 m-auto">
        <label for="product_image1" name="product_image1" id="product_image1" class="form-label">
            Product Image 1</label>
            <input type="file" placeholder="Enter Product Image 1" name="product_image1" 
            id="product_image1" autocomplete="off" required="required" class="form-control">
    </div>
    <!--product_image2-->
    <div class="form-outline w-50 p-3 m-auto">
        <label for="product_image2" name="product_image2" id="product_image2"
        class="form-label">Product Image 2</label>
        <input type="file" placeholder="Enter Product Image 2" name="product_image2"
        id="product_image2" autocomplete="off" required="required" class="form-control">
    </div>
    <!--product_image3-->
    <div class="form-outline w-50 p-3 m-auto">
        <label for="product_image3" name="product_image3" id="product_image3"
        class="form-label">Product Image 3</label>
        <input type="file" placeholder="Enter Product Image 3" name="product_image3"
        id="product_image3" autocomplete="off" required="required" class="form-control">
    </div>
    <!--product price-->
    <div class="form-outline w-50 p-3 m-auto">
        <label for="product_price" name="product_price" id="product_price" class="form-label">
            Product Price</label>
            <input type="text" placeholder="Enter product price" name="product_price" id="product_price"
            autocomplete="off" required="required" class="form-control">
    </div>
    <!--submit button
    <div class="button w-50 p-3 m-auto">
        <input type="submit" name="insert product" id="product_price"
        autocomplete="off" required="required" class="form-control">
    </div>-->


    <!--submit button-->
    <form action="#" method="post" enctype="multipart/form-data">
    <div class="button w-50 p-3 m-auto">
        <input type="submit" name="insert_product" id="insert_product"
        value="Insert Product" class="form-control btn btn-info button" style="width:130;">
    </div>
    </form>
    </div>
    </body>
    </html>
        