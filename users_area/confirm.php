<!--users_area-->
<!--confirm.php-->
<?php
include("../includes/connect.php");
session_start();
if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
    $select="select * from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$select);
    $row=mysqli_fetch_assoc($result);
    $invoice_number=$row['invoice_number'];
    $amount_due=$row['amount_due'];
    if(isset($_POST['confirm']))
    {
        if(isset($_POST['invoice_number']))
        {
            $invoice_number=$_POST['invoice_number'];
        }
        if(isset($_POST['amount_due']))
        {
            $amount_due=$_POST['amount_due'];
        }
        $payment_mode=$_POST['payment_mode'];
        $insert="insert into user_payments(order_id,invoice_number,amount,payment_mode)
        values($order_id,$invoice_number,$amount_due,'$payment_mode')";
        $result_query=mysqli_query($con,$insert);
        if($result_query)
        {
            echo "<h2 class='text-center text-light'>Successfully Done Your Payment</h2>";
            echo "<script>window.open('profile.php?my_orders','_self')</script>";
            $update="update user_orders set order_status='Complete' where order_id=$order_id";
            $result_update=mysqli_query($con,$update);
        }
    }
}
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
</head>
<body class="bg-dark text-center">
    <div class="container m-3">
        <form action="" method="post">
            <h2 class="text-center text-light">Confirm Payment</h2>
            <div class="form-outline w-50 m-auto mt-5"> 
                <input type="submit" class="form-control w-50 m-auto" name="invoice_number" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline w-50 m-auto mt-4"> 
                <label for="" class="text-center text-light">Amount</label>
                <input type="submit" class="form-control text-align-left w-50 m-auto" name="amount_due" value="<?php echo $amount_due ?>">
            </div>
            <div class="form-outline w-50 m-auto mt-4"> 
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Paytm</option>
                    <option>CreditCard</option>
                    <option>GPay</option>
                    <option>AmazonPay</option>
                    <option>UPI</option>
                    <option>DebitCard</option>
                    <option>Netbanking</option>
                    <option>PhonePe</option>
                    <option>Paypal</option>
                </select>
            </div>
            <div class="form-outline w-50 m-auto mt-4">
                <input type="submit" class="bg-info border-0 p-2 my-2 mx-3" name="confirm" value="Confirm">
            </div>
        </form>
    </div>
</body>
</html>