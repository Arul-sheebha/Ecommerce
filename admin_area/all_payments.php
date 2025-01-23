<!--all_payments.php-->

<table class="table table-bordered mt-4">
    <thead>
        <?php
        $select="select * from `user_payments`";
        $result=mysqli_query($con,$select);
        $row_count=mysqli_num_rows($result);
        if($row_count==0)
        {
            echo "<h2 class='text-danger text-center mt-5'>No Payments Received Yet</h2>";
        }
        else
        {
            echo "
            <h2 class='text-center text-success mt-3'>All Payments</h2>
            <tr>
            <th class='text-center bg-info'>SIno</th>
            <th class='text-center bg-info'>Invoice Number</th>
            <th class='text-center bg-info'>Amount</th>
            <th class='text-center bg-info'>Payment Mode</th>
            <th class='text-center bg-info'>Order Date</th>
            <th class='text-center bg-info'>Delete</th>
            </tr>
            </thead>";
            $number=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $payment_id=$row['payment_id'];
                $order_id=$row['order_id'];
                $invoice_number=$row['invoice_number'];
                $amount=$row['amount'];
                $payment_mode=$row['payment_mode'];
                $date=$row['date'];
                $number++;
                echo"
                <tbody>
                <tr>
                <td class='text-center bg-secondary text-light'>$number</td>
                <td class='text-center bg-secondary text-light'>$invoice_number</td>
                <td class='text-center bg-secondary text-light'>$amount</td>
                <td class='text-center bg-secondary text-light'>$payment_mode</td>
                <td class='text-center bg-secondary text-light'>$date</td>
                <td class='text-center bg-secondary text-light'>
                <a href='index.php?delete_payments=$payment_id' class='text-decoration-none text-light'>Delete</a></td>
                </tr>
                </tbody>";
            }

        }
        ?>
        </table>
