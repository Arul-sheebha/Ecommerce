<!--users_area-->
<!--my_orders.php-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
        $username=$_SESSION['username'];
        $select="select * from `user_table` where username='$username'";
        $result=mysqli_query($con,$select);
        $num=mysqli_fetch_array($result);
        $user_id=$num['user_id'];
        ?>
       
            <?php
            $select_user="select * from `user_orders` where user_id=$user_id";
            $result_user=mysqli_query($con,$select_user);
            $num=mysqli_num_rows($result_user);
            if($num==0)
            {
                echo "<h2 class='text-center text-danger mt-10'>No Orders Yet</h2>";
            }
            else
            {
                echo "<h2 class='text-success text-center mb-4 mt-2'>All my Orders</h2>
                <table class='table table-bordered text-center text-light'>
                <thead class='bg-info text-light'>
                    <tr>
                        <th class='bg-info'>SI no</th>
                        <th class='bg-info'>Amount Due</th>
                        <th class='bg-info'>Total Products</th>
                        <th class='bg-info'>Invoice Number</th>
                        <th class='bg-info'>Date</th>
                        <th class='bg-info'>Complete/Incomplete</th>
                        <th class='bg-info'>Status</th>
                    </tr>
                </thead>"
                ;
            }
            $number=1;
            while($row=mysqli_fetch_array($result_user))
            {
                $order_id=$row['order_id'];
                $amount_due=$row['amount_due'];
                $total_products=$row['total_products'];
                $invoice_number=$row['invoice_number'];
                $order_date=$row['order_date'];
                $order_status=$row['order_status'];
                if($order_status=='pending')
                {
                    $order_status='Incomplete';
                }
                else
                {
                    $order_status='Complete';
                }
                echo"
                
  
                
                <tbody class='bg-secondary text-light'>
                <tr class='bg-secondary text-light'>
                <td class='bg-secondary'>$number</td>
                <td class='bg-secondary'>$amount_due</td>
                <td class='bg-secondary'>$total_products</td>
                <td class='bg-secondary'>$invoice_number</td>
                <td class='bg-secondary'>$order_date</td>
                <td class='bg-secondary'>$order_status</td>";
                ?>
                <?php
                if($order_status=='Complete')
                {
                    echo"<td class='bg-secondary'>Paid</td>";
                }
                else
                {
                    echo"<td class='bg-secondary text-light'><a class='bg-secondary text-light text-decoration-none' href='confirm.php?order_id=$order_id'>
                    Confirm</a></td></tr>";
                }
                $number++;
            }
            ?>
            </tbody>
        </table>
    </body>
</html>
        