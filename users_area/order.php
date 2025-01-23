<!--users_area-->
<!--order.php-->
<?php
mysqli_report(MYSQLI_REPORT_ERROR);
try{
    include("../includes/connect.php");
    include("../functions/common_function.php");
    if(isset($_GET['user_id']))
    {
        $user_id=$_GET['user_id'];
    }
    //get total items and product price
    $ip_address=getIPAddress();
    $total_price=0;
    $select="select * from cart_details where ip_address='$ip_address'";
    $result=mysqli_query($con,$select);
    $num=mysqli_num_rows($result);
    $invoice_number=mt_rand();
    $status='pending';
    while($row=mysqli_fetch_array($result))
    {
        $product_id=$row['product_id'];
        $select_query="select * from products where product_id=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row_price=mysqli_fetch_array($result_query))
        {
            $product_price=array($row_price['product_price']);
            $product_value=array_sum($product_price);
            $total_price+=$product_value;
        }
    }
    //quantity
    $select_quantity="select * from cart_details";
    $result_quantity=mysqli_query($con,$select_quantity);
    $row_quantity=mysqli_fetch_array($result_quantity);
    $quantity=$row_quantity['quantity'];
    if($quantity==0)
    {
        $quantity=1;
        $subtotal=$total_price;
    }
    else
    {
        $quantity=$quantity;
        $subtotal=$total_price*$quantity;
    }
    $insert="insert into user_orders(user_id,amount_due,invoice_number,total_products,order_date,order_status)
    values ($user_id,$subtotal,$invoice_number,$num,NOW(),'$status')";
    $result_insert=mysqli_query($con,$insert);
    if($result_insert)
    {
        echo"<script>alert('Orders are submitted succesfully')</script>";
        echo"<script>window.open('profile.php','_self')</script>";
        
        
    }
    $insert_order="insert into orders_pending (user_id,invoice_number,product_id,quantity,order_status)
    values($user_id,$invoice_number,$product_id,$quantity,'$status')";
    $result_order=mysqli_query($con,$insert_order);
    $delete="delete from cart_details where ip_address='$ip_address'";
    $result_delete=mysqli_query($con,$delete);
    
}
catch(mysqli_sql_exception $e)
{
    error_log($e->_toString);
}
?> 