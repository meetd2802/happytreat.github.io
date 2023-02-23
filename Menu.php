<?php include('../Restaurant/config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy_Treats</title>
    <link rel="stylesheet" href="css/style_menu.css">
</head>
<body>
    <style>
        body 
        {
            background-color:lightsteelblue;
            color: blueviolet;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>

<!-- header section starts      -->

<header>

    <a href="#" class="logo"><img src="images/back.png" alt="Restaurant" class="img-responsive"></a>

    <nav class="navbar">
        <a href="<?php echo SITEURL; ?>res-login.php">LOGIN</a>
        <a  href="<?php echo SITEURL; ?>home.php">HOME</a>
        <a class="active" href="<?php echo SITEURL; ?>menu.php">MENU</a>
        <a href="<?php echo SITEURL; ?>Aboutus.php">ABOUT</a>
        <a href="<?php echo SITEURL; ?>contact.php">CONATACT US</a>
        <a href="<?php echo SITEURL; ?>order.php">ORDER NOW</a>

    </nav>
</header>

<!-- header section ends-->
<!--Food Menu starts from here-->
<section class="menu" id="menu">
    <div class="container">
    <h3 class="sub-heading">Our Menu</h3>
    <h1 class="heading">Speciality</h1>
    <div class="box-container" class="img-responsive" >

    <?php
        //getting food from data base that are active and featured
        //sql query
        $sql2 = "SELECT*FROM tbl_food Where active='yes' and featured='yes'";

        //execute query
        $res2=mysqli_query($conn,$sql2);

        //count rows
        $count2=mysqli_num_rows($res2);

        //check whether food available or not
        if($count2>0)
        {
            //food available
            while($row=mysqli_fetch_assoc($res2))
            {
                //get all the values 
                $id=$row['id'];
                $title=$row['title'];
                $image_name=$row['img_name'];
                $description=$row['description'];
                $price=$row['price'];
                ?>
                <div class="box">
                <div class="image">
                    <?php
                    //check wether image available or not 
                    if($image_name=="")
                    {
                        //image not available
                        echo "<div> Image not available</div>";
                    }
                    else
                    {
                        //image available
                        ?>
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="">
                        <?php
                    }
                    ?>
                    
                </div>
                <div class="content">
                <h3><?php echo $title; ?></h3>
                <p><?php echo $description; ?></p>
                <a href="<?php echo SITEURL ?>order.php?food_id=<?php echo $id ?>" class="btn btn-primary">Order Now</a>
                <span class="pice">Rs.<?php echo $price; ?>/-</span>
                </div>
                </div>
                <?php

            }

        } 
        else
        {
            //food not available
            echo "<div> food not available</div>";
        }

    ?>
        

    </div>
    </div>

    

                    
    </div>   
</section>
<!--Food Menu ends from here-->

<!--social starts from here-->
<section class="Social">
<div class="container txt-center">
    <ul>
        <li>
            <a href="#"><img src="https://img.icons8.com/fluent/50/000000/facebook-new.png"</a>
        </li>
        <li>
            <a href="#"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
        </li>
        <li>
            <a href="#"><img src="https://img.icons8.com/fluent/48/000000/twitter.png"/></a>
        </li>
        <li>
            <a href="#"><img src="https://img.icons8.com/fluent/48/000000/whatsapp.png"/></a>
        </li>
    </ul>  
</div>
</section>
<!--social ends from here-->

<!--Footer starts from here-->
<section class="footer">
<div class="container txt-center">
    <p>All rights reseved by. <a href="#" style="color: darkorange">HAPPY TREATS</a></p>    
</div>
</section>
<!--Footer  ends from here-->

</body>
</html>