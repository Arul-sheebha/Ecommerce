<!--admin_area-->
<!--admin_registration-->
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
session_start();
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
<body background="../images/palm tree.jpg" style="background-repeat: no-repeat; background-size: cover;">
    <h2 class="text-center text-light mt-5">Admin Login</h2>
    <center>
        <div class="col-lg-5  col-xl-5 mt-5">
            <form action="" method="post"  class="text-center justify-content-center align-items-center">
                <div class="form-outline">
                    <label for="admin_name" class="form_label text-light">Admin Name</label>
                    <input type="text" placeholder="Enter your Name" name="admin_name"
                    class="form-control w-70 mt-3" required="required">
                </div>
               
                <div class="form-outline mt-4">
                    <label for="admin_password" class="form-lable text-light">Password</label>
                    <input type="password" placeholder="Enter your password" name="admin_password"
                    class="form-control mt-3 w-70" required="required">
                </div>
                
                <div class="form-outline mt-4">
                    <input type="submit" name="admin_login" value="Login"
                    class="btn btn-info px-3 py-2">
                    <p class="fw-bold mt-2 text-light">Don't have an account ? <a href="admin_registration.php"
                    class="link-danger">Register</a></p>
                </div>
</form>
        </div>
    </div>
</body>
</html>



<?php
mysqli_report(MYSQLI_REPORT_ERROR);
try{
    if(isset($_POST['admin_login']))
    {
        $admin_name=$_POST['admin_name'];
       
        $admin_password=$_POST['admin_password'];
        
       
        $user_ip=getIPAddress();
        
        $select_query="select * from `admin_table` where admin_name='$admin_name'";
        $result=mysqli_query($con,$select_query);
        $row_count=mysqli_num_rows($result);
        $row_data=mysqli_fetch_assoc($result);
        $ip_address=getIPAddress();
        if($row_count>0)
        {
            $_SESSION['admin_name']="$admin_name";
            if(password_verify($admin_password,$row_data['admin_password']))
            {
                if($row_count==1)
                {
                    echo "<script>alert('login successfully')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
            }
            else
            {
                echo "<script>alert('invalid credentials')</script>";
            }
        }
        else
        {
            echo "<script>alert('invalid credentials')</script>";
        }
    }
}
catch(mysqli_sql_exception $e)
{
    error_log($e->_toString());
}
?>