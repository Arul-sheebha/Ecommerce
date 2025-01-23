<!--list_users.php-->

<table class="table table-bordered mt-4">
    <thead>
        <?php
        $select="select * from `user_table`";
        $result=mysqli_query($con,$select);
        $row_count=mysqli_num_rows($result);
        if($row_count==0)
        {
            echo "<h2 class='text-danger text-center mt-5'>No Users Yet</h2>";
        }
        else
        {
            echo "
            <h2 class='text-center text-success mt-3'>All Users</h2>
            <tr>
            <th class='text-center bg-info'>SIno</th>
            <th class='text-center bg-info'>Username</th>
            <th class='text-center bg-info'>User Email</th>
            <th class='text-center bg-info'>User Image</th>
            <th class='text-center bg-info'>User Address</th>
            <th class='text-center bg-info'>User Mobile</th>
            <th class='text-center bg-info'>Delete</th>
            </tr>
            </thead>";
            $number=0;
            while($row=mysqli_fetch_assoc($result))
            {
                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_email=$row['user_email'];
                $user_password=$row['user_password'];
                $user_image=$row['user_image'];
                $user_ip=$row['user_ip'];
                $user_address=$row['user_address'];
                $user_mobile=$row['user_mobile'];
                $number++;
                echo"
                <tbody>
                <tr>
                <td class='text-center bg-secondary text-light'>$number</td>
                <td class='text-center bg-secondary text-light'>$username</td>
                <td class='text-center bg-secondary text-light'>$user_email</td>
                <td class='text-center bg-secondary text-light'><img src='../users_area/user_images/$user_image'
                alt='$username' style='height: 100px;'></td>
                <td class='text-center bg-secondary text-light'>$user_address</td>
                <td class='text-center bg-secondary text-light'>$user_mobile</td>
                <td class='text-center bg-secondary text-light'>
                <a href='index.php?delete_users=$user_id' class='text-decoration-none text-light'>Delete</a></td>
                </tr>
                </tbody>";
            }

        }
        ?>
        </table>
