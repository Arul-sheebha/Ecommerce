<!--admin_area-->
<!--admin_registration-->
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
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
    <style>
        
    </style>
</head>
<body background="../images/waterfall.jpg" style="background-repeat: no-repeat; background-size: cover;">
    <h2 class="text-center text-light mt-5">Admin Registration</h2>
    <center>
        <div class="col-lg-5  col-xl-5 mt-5">
            <form action="" method="post"  class="text-center justify-content-center align-items-center">
                <div class="form-outline">
                    <label for="admin_name" class="form_label text-light">Admin Name</label>
                    <input type="text" placeholder="Enter your name" name="admin_name"
                    class="form-control w-70 mt-3" required="required">
                </div>
                <div class="form-outline mt-4">
                    <label for="admin_email" class="form-label text-light">Email</label>
                    <input type="email" placeholder="Enter your email" name="admin_email"
                    class="form-control mt-3 w-70" required="required">
                </div>
                <div class="form-outline mt-4">
                    <label for="admin_password" class="form-lable text-light">Password</label>
                    <input type="password" placeholder="Enter your password" name="admin_password"
                    class="form-control mt-3 w-70" required="required">
                </div>
                <div class="form-outline mt-4">
                    <label for="admin_conf_password" class="form-label text-light">Confirm Password</label>
                    <input type="password" placeholder="Enter your confirm password" name="admin_conf_password"
                    class="form-control mt-3 w-70" required="required">
                </div>
                <div class="form-outline mt-4">
                    <input type="submit" name="admin_register" value="Register"
                    class="btn btn-info px-3 py-2">
                    <p class="fw-bold mt-2 text-light">Already have an account ? <a href="admin_login.php"
                    class="link-danger">Login</a></p>
                </div>
</form>
        </div>
    </div>
</body>
</html>



<?php
mysqli_report(MYSQLI_REPORT_ERROR);
try{
    if(isset($_POST['admin_register']))
    {
        $admin_name=$_POST['admin_name'];
        $admin_email=$_POST['admin_email'];
        $admin_password=$_POST['admin_password'];
        $password_hash=password_hash($admin_password,PASSWORD_DEFAULT);
        $admin_conf_password=$_POST['admin_conf_password'];
        $user_ip=getIPAddress();
        
        
        $select_query="select * from `admin_table` where admin_name='$admin_name' or admin_email='$admin_email'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        if($row_count>0)
        {
            echo "<script>alert('admin name or email is already exist')</script>";
        }
        elseif($admin_password!=$admin_conf_password)
        {
            echo "<script>alert('your password is incorrect.please enter a correct password')</script>";
        }
        else
        {
            $insert_query="insert into `admin_table` (admin_name,admin_email,admin_password)
            values('$admin_name','$admin_email','$password_hash')";
            $sql_execute=mysqli_query($con,$insert_query);
            if($sql_execute)
            {
                echo "<script>alert('admin registered successfully')</script>";
                echo "<script>window.open('admin_login.php','_self')</script>";
            }
        }
    }
}
catch(mysqli_sql_exception $e)
{
    error_log($e->_toString());
}
?>