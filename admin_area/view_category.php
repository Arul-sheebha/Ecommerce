<!--view_category.php-->
<h2 class="text-center text-success">All Categories</h2>
<table class="table table-bordered mt-5">
    <thead>
        <tr class="text-center bg-info">
            <th class="text-center bg-info">SIno</th>
            <th class="text-center bg-info">Category Title</th>
            <th class="text-center bg-info">Edit</th>
            <th class="text-center bg-info">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select="select * from `categories`";
        $result=mysqli_query($con,$select);
        $number=0;

        while($row=mysqli_fetch_assoc($result))
        {
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            $number++;
        
        ?>
        <tr class="text-center bg-secondary">
            <td class="text-center bg-secondary text-light">
                <?php echo $number;?></td>
                <td class="text-center bg-secondary text-light">
                    <?php echo $category_title;?></td>

                    <td class="bg-secondary text-center text-light"><a href="index.php?edit_category=<?php echo
                    $category_id;?>" class="text-light text-decoration-none">Edit</a></td>
                    <td class="bg-secondary text-center text-light"><a href="index.php?delete_category=
                    <?php echo $category_id;?>" class="text-light 
                    text-decoration-none">Delete</a></td>
        </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
               