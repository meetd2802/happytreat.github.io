<?php
    //Authorization
    //check whether the user is loged in or not
    if(!isset($_SESSION['user']))//if user session is not set 
    {
        //user is not login
        //redirect to login page
        $_SESSION['no-login'] = "<div class='error'>Please login to access login panel</div>";
        header('location:http://localhost/restaurant/login.php');
    }
?>
