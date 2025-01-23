<!--users_area-->
<!--delete_account.php-->
<h3 class="text-center text-danger">Delete Account</h3>
<form action="" method="post">
    <div class="form-outline w-50 m-auto mt-6 mb-3">
        <input type="submit" class="form-control w-120 m-auto mt-5 mb-3" value="Delete Account" name="delete">
    </div>
    <div class="form-outline w-50 m-auto mt-6 mb-3">
        <input type="submit" class="form-control w-120 m-auto mt-5 mb-3" value="Don't Delete Account" name="dont_delete">
    </div>
</form>
<?php
if(isset($_POST['delete']))
{
    $username=$_SESSION['username'];
    $delete="delete from `user_table` where username='$username'";
    $result=mysqli_query($con,$delete);
    {
        session_destroy();
        echo"<script>alert('Account Deleted Successfully')</script>";
        echo"<script>window.open('../index.php','_self')</script>";
    }
}
if(isset($_POST['dont_delete']))
{
    echo "<script>window.open('profile.php','_self')</script>";
}
?>
    