<!--edit_brand.php-->
<?php
if(isset($_GET['edit_brand']))
{
    $brand_id=$_GET['edit_brand'];
    //echo $brand_id;
    $select="select * from `brand` where brand_id=$brand_id";
    $result=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($result))
    {
        $brand_title=$row['brand_title'];
    }
}

if(isset($_POST['update_brand']))
{
    $brand_title=$_POST['brand_title'];

    $update="update `brand` set brand_title='$brand_title' where brand_id=$brand_id";
    $result_update=mysqli_query($con,$update);
    if($result_update)
    {
        echo "<script>alert('brand is updated successfully')</script>";
        echo "<script>window.open('index.php?view_brand','_self')</script>";
    }
}
?>


<h2 class="text-center text-success">Edit Brand</h2>
<form action="" method="post" class="text-center">
    <label for="brand_title" class="text-center form-outline mt-3">Brand Title</label>
    <input type="text" name="brand_title" value="<?php echo $brand_title;?>"
     class="w-50 mt-2 m-auto form-control">

     <input type="submit" value="Update Brand" name="update_brand" class="text-center btn-info mt-4 btn">
</form>