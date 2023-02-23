<?php
    //include constants 
    include('../config/constants.php');

    //1.destroy the session
    session_destroy();//unset $_session['user]
    //2.redirect to login page
    header('location:http://localhost/restaurant/admin/con-admin.php');
?>