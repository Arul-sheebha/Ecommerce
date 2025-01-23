<!--all_orders.php-->

<table class="table table-bordered mt-4">
    <thead>
        <?php
        $select="select * from `user_orders`";
        $result=mysqli_query($con,$select);
        $row_count=mysqli_num_rows($result);
        if($row_count==0)
        {
            echo "<h2 class='text-danger text-center mt-5'>No Orders Yet</h2>";
        }
        else
        {
            echo "
            <h2 class='text-center text-success mt-3'>All Orders</h2>
            <tr>
            <th class='text-center bg-info'>SIno</th>
            <th class='text-center bg-info'>Due Amount</th>
            <th class='text-center bg-info'>Invoice Number</th>
            <th class='text-center bg-info'>Total Products</th>
            <th class='text-center bg-info'>Order Date</th>
            <th class='text-center bg-info'>Order Status</th>
            <th class='text-center bg-info'>Delete</th>
            </tr>
            </thead>";
            $number=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $order_id=$row['order_id'];
                $user_id=$row['user_id'];
                $amount_due=$row['amount_due'];
                $invoice_number=$row['invoice_number'];
                $total_products=$row['total_products'];
                $order_date=$row['order_date'];
                $order_status=$row['order_status'];
                $number++;
                echo"
                <tbody>
                <tr>
                <td class='text-center bg-secondary text-light'>$number</td>
                <td class='text-center bg-secondary text-light'>$amount_due</td>
                <td class='text-center bg-secondary text-light'>$invoice_number</td>
                <td class='text-center bg-secondary text-light'>$total_products</td>
                <td class='text-center bg-secondary text-light'>$order_date</td>
                <td class='text-center bg-secondary text-light'>$order_status</td>
                <td class='text-center bg-secondary text-light'>
                <a href='index.php?delete_orders=$order_id' class='text-decoration-none text-light'>Delete</a></td>
                </tr>
                </tbody>";
            }

        }
        ?>
        </table>
