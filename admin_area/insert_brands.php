<?php
include("../includes/connect.php");
if(isset($_POST['insert_brand']))
{
    $brands=$_POST['brand_title'];
    $select_query="select * from `brand` where brand_title='$brands'";
    $result_select=mysqli_query($con,$select_query);
    $num=mysqli_num_rows($result_select);
    if($num>0)
    {
        echo "<script>alert('this brand already present in database')</script>";
    }
    else
    {
        $insert_query="insert into `brand` (brand_title) value ('$brands')";
        $result=mysqli_query($con,$insert_query);
        if($result)
        {
            echo "<script>alert('brand inserted successfully')</script>"; 
        }
    }
}
?>

<form action="" method="post" class="mb-2">
    <h2 class="p-2 text-center">Insert Brands</h2>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Insert Brands" name="brand_title" 
        aria-label="brands" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
    <input type="submit" class="text-center p-2 my-3 border-0 bg-info" value="Insert Brands" name="insert_brand">
    </div>
</form>