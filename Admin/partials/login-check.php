<?php
    //Authorization
    //check whether the user is loged in or not
    if(!isset($_SESSION['user']))//if user session is not set 
    {
        //user is not login
        //redirect to login page
        $_SESSION['no-login'] = "<div class='error'>Please login to access Admin Panel</div>";
        header('location:http://localhost/restaurant/admin/con-admin.php');
    }
?>
