<!--users_area-->
<!--payment.php-->
<?php
include("../includes/connect.php");
include("../functions/common_function.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
    <!--bootstrap css link-->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
    <style>
        .payment{
            height:200px;
            width:300px;
        }
        </style>
</head>
<body>
    <?php
    $ip_address=getIPAddress();
    $select="select * from `user_table` where user_ip='$ip_address'";
    $result=mysqli_query($con,$select);
    $run=mysqli_fetch_array($result);
    $user_id=$run['user_id'];
    ?>
    <div class="container justify-content-center align-items-center my-4">
        <h2 class="text-center text-info">Payment Process</h2>
        <div class="row d-flex justify-content-center align-items-center my-4 p-5">
            
            <div class="col-md-12">
                <a href="order.php?user_id=<?php echo $user_id ?>"class="text-center">
                <h3>Pay Online</h3></a>
            </div>
        </div>
    </div>
</body>
</html>