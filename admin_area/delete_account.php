<!--admin_area-->
<!--delete_account-->
<h3 class="text-center text-danger">Delete Account</h3>
<form action="" method="post">
    <div class="form-outline w-50 m-auto mt-6 mb-5">
        <input type="submit" class="form-control w-120 m-auto mt-5 mb-3"
        value="Delete Account" name="delete">
    </div>
    <div class="form-outline w-50 m-auto mb-6 mb-5">
        <input type="submit" class="form-control w-120 m-auto mt-5 mb-3"
        value="Don't Delete Account" name="dont_delete">
    </div>
</form>
<?php
if(isset($_POST['delete']))
{
    $admin_name=$_SESSION['admin_name'];
    $delete="delete from `admin_table` where admin_name='$admin_name'";
    $result=mysqli_query($con,$delete);
    if($result)
    {
        session_destroy();
        echo "<script>alert('account deleted successfully')</script>";
        echo "<script>window.open('admin_registration.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete']))
{
    echo "<script>window.open('admin_account.php','_self')</script>";
}
?>