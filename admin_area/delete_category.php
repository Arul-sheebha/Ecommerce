<!--delete_category.php-->
<?php
if(isset($_GET['delete_category']))
{
    $category_id=$_GET['delete_category'];
    //echo $category_id;

    $delete="delete from `categories` where category_id=$category_id";
    $result=mysqli_query($con,$delete);
    if($result)
    {
        echo "<script>alert('category deleted successfully')</script>";
        echo "<script>window.open('index.php?view_category','_self')<script>";
    }
}
?>