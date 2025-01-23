<?php
if(isset($_GET['delete_orders']))
{
    $order_id=$_GET['delete_orders'];
    //echo $order_id;
    $delete="delete from `user_orders` where order_id=$order_id";
    $result=mysqli_query($con,$delete);
    if($result)
    {
        echo "<script>alert('orders deleted successfully')</script>";
        echo "<script>window.open('index.php?all_orders','_self')</script>";
    }
    
}
?>