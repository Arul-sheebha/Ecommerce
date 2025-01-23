<?php
include("../includes/connect.php");
?>


<?php
if(isset($_GET['edit_products']))
{
    $product_id=$_GET['edit_products'];
    //echo $product_id;
    $select="select * from `products` where product_id=$product_id";
    $result=mysqli_query($con,$select);
    $row=mysqli_fetch_assoc($result);
    $product_title=$row['product_title'];
    $product_description=$row['product_description'];
    $product_keywords=$row['product_keywords'];
    $category_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_image2=$row['product_image2'];
    $product_image3=$row['product_image3'];
    $product_price=$row['product_price'];

    $select_category="select * from `categories` where category_id=$category_id";
    $result_category=mysqli_query($con,$select_category);
    $row_category=mysqli_fetch_assoc($result_category);
    $category_title=$row_category['category_title'];
    
    $select_brand="select * from `brand` where brand_id=$brand_id";
    $result_brand=mysqli_query($con,$select_brand);
    $row_brand=mysqli_fetch_assoc($result_brand);
    $brand_title=$row_brand['brand_title'];
}
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
<h2 class="text-center text-success">Edit Product</h2>
<form action="" method="post" enctype="multipart/form-data">
    <div class="m-auto w-50 form-outline">
        <label for="product_title" class="m-auto mb-3 mt-5 form-label">Product Title</label>
        <input type="text" class="w-30 form-control m-auto" name="product_title"
        value="<?php echo $product_title;?>" id="product_title" required="required">
</div>

<div class="m-auto w-50 form-outline">
        <label for="product_description" class="m-auto mb-3 mt-5 form-label">Product Description</label>
        <input type="text" class="w-30 form-control m-auto" name="product_description" required="required"
        value="<?php echo $product_description;?>" id="product_description">
</div>

<div class="m-auto w-50 form-outline">
        <label for="product_keywords" class="m-auto mb-3 mt-5 form-label">Product Keywords</label>
        <input type="text" class="w-30 form-control m-auto" name="product_keywords" required="required"
        value="<?php echo $product_keywords;?>" id="product_keywords">
</div>

<div class="m-auto w-50 form_outline m-auto mb-3 mt-5 form-label">
    <label for="product_categories" class="m-auto mb-3">Product Categories</label>
    <select class="form-select" name="product_categories" id="" required="required">
        <option value="<?php echo $category_id;?>"><?php echo $category_title;?></option>

        <?php
        $category="select * from `categories`";
        $category_result=mysqli_query($con,$category);
        while($category_row=mysqli_fetch_array($category_result))
        {
            $category_title=$category_row['category_title'];
            $category_id=$category_row['category_id'];
            echo "<option value='$category_id'>$category_title</option>";
        }
        ?>

    </select>
    </div>



    <div class="m-auto w-50 form_outline m-auto mb-3 mt-5 form-label">
    <label for="product_brands" class="m-auto mb-3">Product Brands</label>
    <select class="form-select" name="product_brands" id="" required="required">
        <option value="<?php echo $brand_id;?>"><?php echo $brand_title;?></option>

        <?php
        $brand="select * from `brand`";
        $brand_result=mysqli_query($con,$brand);
        while($brand_row=mysqli_fetch_array($brand_result))
        {
            $brand_title=$brand_row['brand_title'];
            $brand_id=$brand_row['brand_id'];
            echo "<option value='$brand_id'>$brand_title</option>";
        }
        ?>

    </select>
    </div>



    <div class="m-auto w-50 form-outline">
        <label for="product_image1" class="m-auto mb-3 mt-5 form-label">Product Image 1</label>
        <div class="d-flex">
        <input type="file" class="w-30 form-control m-auto" name="product_image1" required="required"
        style="width:200%; height:70px;" id="product_image1">
        <img src="./product_images/<?php echo $product_image1;?>"
        style="width:70px; height:70px;" alt="">
    </div>
</div>

<div class="m-auto w-50 form-outline">
        <label for="product_image2" class="m-auto mb-3 mt-5 form-label">Product Image 2</label>
        <div class="d-flex">
        <input type="file" class="w-30 form-control m-auto" name="product_image2" required="required"
        style="width:200%; height:70px;" id="product_image2">
        <img src="./product_images/<?php echo $product_image2;?>"
        style="width:70px; height:70px;" alt="">
    </div>
</div>

<div class="m-auto w-50 form-outline">
        <label for="product_image3" class="m-auto mb-3 mt-5 form-label">Product Image 3</label>
        <div class="d-flex">
        <input type="file" class="w-30 form-control m-auto" name="product_image3" required="required"
        style="width:200%; height:70px;" id="product_image3">
        <img src="./product_images/<?php echo $product_image3;?>"
        style="width:70px; height:70px;" alt="">
    </div>
</div>


<div class="m-auto w-50 form-outline">
        <label for="product_price" class="m-auto mb-3 mt-5 form-label">Product Price</label>
        <input type="text" class="w-30 form-control m-auto" name="product_price" required="required"
        value="<?php echo $product_price;?>" id="product_price">
</div>

<div class="m-auto mt-5 mb-5 w-50 form-outline">
    <input type="submit" class="text-center btn btn-info mb-5 m-auto" name="update_product" required="required"
    id="update_product" value="Update Product">
    </div>
    </form>





    <?php
    if(isset($_POST['update_product']))
    {
        $product_title=$_POST['product_title'];
        $product_description=$_POST['product_description'];
        $product_keywords=$_POST['product_keywords'];
        $product_categories=$_POST['product_categories'];
        $product_brands=$_POST['product_brands'];
        $product_price=$_POST['product_price'];

        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];
        
        $product_image1_tmp=$_FILES['product_image1']['tmp_name'];
        $product_image2_tmp=$_FILES['product_image2']['tmp_name'];
        $product_image3_tmp=$_FILES['product_image3']['tmp_name'];

        if($product_title =='' or $product_description =='' or $product_keywords =='' or $product_categories =='' or
        $product_brands=='' or $product_price=='')
        {
            echo "<script>alert('please fill all the required fields')</script>";
        }
        else
        {
            move_uploaded_file($product_image1_tmp,"./product_images/$product_image1");
            move_uploaded_file($product_image2_tmp,"./product_images/$product_image2");
            move_uploaded_file($product_image3_tmp,"./product_images/$product_image3");

            $update="update `products` set product_title='$product_title',product_description='$product_description',
            product_keywords='$product_keywords',category_id='$product_categories',
            brand_id='$product_brands',product_image1='$product_image1',product_image2='$product_image2',
            product_image3='$product_image3',product_price='$product_price',date=NOW() where 
            product_id=$product_id";

            $result=mysqli_query($con,$update);
            if($result)
            {
                echo "<script>alert('date updated successfully')</script>";
                echo "<script>window.open('index.php?view_products','_self')</script>";
            }

        }
    }
    ?>
</body>
</html>
