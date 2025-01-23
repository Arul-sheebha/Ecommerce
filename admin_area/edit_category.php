<!--edit_category.php-->
<?php
if(isset($_GET['edit_category']))
{
    $category_id=$_GET['edit_category'];
    //echo $category_id;
    $select="select * from `categories` where category_id=$category_id";
    $result=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($result))
    {
        $category_title=$row['category_title'];
    }
}

if(isset($_POST['update_category']))
{
    $category_title=$_POST['category_title'];

    $update="update `categories` set category_title='$category_title' where category_id=$category_id";
    $result_update=mysqli_query($con,$update);
    if($result_update)
    {
        echo "<script>alert('Category is updated successfully')</script>";
        echo "<script>window.open('index.php?view_category','_self')</script>";
    }
}
?>


<h2 class="text-center text-success">Edit Category</h2>
<form action="" method="post" class="text-center">
    <label for="category_title" class="text-center form-outline mt-3">Category Title</label>
    <input type="text" name="category_title" value="<?php echo $category_title;?>"
     class="w-50 mt-2 m-auto form-control">

     <input type="submit" value="Update Category" name="update_category" class="text-center btn-info mt-4 btn">
</form>