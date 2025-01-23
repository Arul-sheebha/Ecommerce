<!--delete_brand.php-->
<?php
if(isset($_GET['delete_brand']))
{
    $brand_id=$_GET['delete_brand'];
    //echo $brand_id;

    $delete="delete from `brand` where brand_id=$brand_id";
    $result=mysqli_query($con,$delete);
    if($result)
    {
        echo "<script>alert('brand deleted successfully')</script>";
        echo "<script>window.open('index.php?view_brand','_self')<script>";
    }
}
?>