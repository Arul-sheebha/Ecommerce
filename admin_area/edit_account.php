<!--admin_area-->
<!--edit_account.php-->
<?php
if(isset($_GET['edit_account']))
{
    $admin_name=$_SESSION['admin_name'];
    $select="select * from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$select);
    $num=mysqli_fetch_assoc($result);
    $admin_id=$num['admin_id'];
    $admin_name=$num['admin_name'];
    $admin_email=$num['admin_email'];
    $admin_password=$num['admin_password'];
}
if(isset($_POST['user_update']))
{
    $update_id=$admin_id;
    $update_name=$_POST['user_username'];
    $update_email=$_POST['user_email'];
    $update="update `admin_table` set admin_name='$update_name',admin_email='$update_email' where
    admin_id=$update_id";
    $result_update=mysqli_query($con,$update);
    if($result_update)
    {
        echo "<script>alert('data updated successfully')</script>";
        echo "<script>window.open('admin_logout.php','_self')</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2 class="text-center text-success">Edit Account</h2>
    <div class="d-flex justify-content-center text-center">
        <div class="col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline">
                    <input type="text" name="user_username" style="width:650px;"
                    value="<?php echo $admin_name?>" class="form-control m-4 w-120">
                </div>
                <div class="form-outline">
                    <input type="email" name="user_email" style="width:650px;"
                    value="<?php echo $admin_email?>" class="form-control m-4 w-120">
                </div>
                <input type="submit" class="bg-info border-0 mb-4 py-2 px-3 text-center"
                value="Update" name="user_update">
                
            </form>
        </div>
    </div>
</body>
</html>