<!--delete_users.php-->
<?php
if(isset($_GET['delete_users']))
{
    $user_id=$_GET['delete_users'];
    //echo $user_id;

    $delete="delete from `user_table` where user_id=$user_id";
    $result=mysqli_query($con,$delete);
    if($result)
    {
        echo "<script>alert('user deleted successfully')</script>";
        echo "<script>window.open('index.php?list_users','_self')</script>";
    }
}
?>