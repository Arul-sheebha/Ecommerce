<!--delete_payments.php-->
<?php
if(isset($_GET['delete_payments']))
{
    $payment_id=$_GET['delete_payments'];
    //echo $payment_id;

    $delete="delete from `user_payments` where payment_id=$payment_id";
    $result=mysqli_query($con,$delete);
    if($result)
    {
        echo "<script>alert('payment deleted successfully')</script>";
        echo "<script>window.open('index.php?all_payments','_self')</script>";
    }
}
?>