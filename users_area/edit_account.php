<!--users_area-->
<!--edit_account.php-->
<?php
if(isset($_GET['edit_account']))
{
    $username=$_SESSION['username'];
    $select="select * from user_table where username='$username'";
    $result=mysqli_query($con,$select);
    $num=mysqli_fetch_assoc($result);
    $user_id=$num['user_id'];
    $user_name=$num['username'];
    $user_email=$num['user_email'];
    $user_address=$num['user_address'];
    $user_mobile=$num['user_mobile'];
}
if(isset($_POST['user_update']))
{
    $update_id=$user_id;
    $update_name=$_POST['user_username'];
    $update_email=$_POST['user_email'];
    $update_address=$_POST['user_address'];
    $update_mobile=$_POST['user_mobile'];
    $update_image=$_FILES['user_image']['name'];
    $update_image_tmp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($update_image_tmp,"./user_images/$update_image");
    $update="update user_table set username='$update_name',user_email='$update_email',
    user_image='$update_image',user_address='$update_address',user_mobile='$update_mobile' where user_id=$update_id";
    $result_update=mysqli_query($con,$update);
    if($result_update)
    {
        echo"<script>alert('data updated successfully')</script>";
        echo"<script>window.open('logout.php','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=z,initial-scale=1.0">
        <title>Document</title>
</head>
<body>
    <h2 class="text-center text-success">Edit Account</h2>
    <div class="d-flex justify-content-center text-center">
        <div class="col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline">
                    <input type="text" name="user_username" class="form-control m-4 w-120" style="width:650px;"
                    value="<?php echo $user_name ?>">
                </div>
                <div class="form-outline">
                    <input type="email" name="user_email" class="form-control m-4 w-120" style="width:650px;"
                    value="<?php echo $user_email ?>">
                </div>
                <div class="d-flex form-outline justify-content-center col-xl-6" style="width:673px;">
                    <input type="file" class="mx-4 w-800 form-control" style="width:850px;" name="user_image">
                    <img src="./user_images/<?php echo $user_image ?>" style="width:100px; height:100px;" alt="">
                </div>
                <div class="form-outline">
                    <input type="text" class="form-control m-4 w-120" style="width:650px;" name="user_address"
                    value="<?php echo $user_address ?>">
                </div>
                <div class="form-outline">
                    <input type="text" class="form-control m-4 w-120" style="width:650px;" name="user_mobile"
                    value="<?php echo $user_mobile ?>">
                </div>
                <input type="submit" class="bg-info border-0 py-2 px-3 text-center" value="Update" name="user_update">
            </div>
            </form>
        </div>
    </div>
</body>
</html>

