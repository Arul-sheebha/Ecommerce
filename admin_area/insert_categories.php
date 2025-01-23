<?php
include("../includes/connect.php");
if(isset($_POST['insert_cat']))
{
    $categories=$_POST['cat_title'];
    $select_query="select * from `categories` where category_title='$categories'";
    $result_select=mysqli_query($con,$select_query);
    $num=mysqli_num_rows($result_select);
    if($num>0)
    {
        echo "<script>alert('this category already present in database')</script>";
    }
    else
    {
        $insert_query="insert into `categories` (category_title) value ('$categories')";
        $result=mysqli_query($con,$insert_query);
        if($result)
        {
            echo "<script>alert('category inserted successfully')</script>"; 
        }
    }
}
?>







<form action="" method="post" class="mb-2">
<h2 class="p-2 text-center">Insert Categories</h2>
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1">@</span>
        <input type="text" class="form-control" placeholder="Insert Categories" name="cat_title" 
        aria-label="categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        <input type="submit" class="text-center p-2 my-3 border-0 bg-info" value="Insert Categories" name="insert_cat">
    </div>
</form>