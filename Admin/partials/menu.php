<?php 
    include('../config/constants.php');
    include('login-check.php');
?>

<html>
    <head>
        <title>Food order website - Home page</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <style>
            body{
                background-color: lightsteelblue;
                
            }
        </style>
        <!-- menu section strats here-->
        <section class="menu txt-center">
            <div class="wrapper">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="mange-admin.php">ADMIN</a></li>
                <li><a href="manage-food.php">FOOD</a></li>
                <li><a href="manage-order.php">ORDER</a></li>
                <li><a href="logout.php">LOG OUT</a></li>
            </ul>
            </div>
        </section>
        <!-- menu section ends here-->