<?php include('../Restaurant/config/constants.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy_Treats</title>
    <link rel="stylesheet" href="css/style_about.css">
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

    .sub-heading
            {   
            padding:10% ;
            text-align: center;
            color: var(--green);
            font-size: 2rem;
            padding-top: 1rem;
            }
        
    
    </style>

<!-- header section starts      -->

<header>

    <a href="#" class="logo"><img src="images/back.png" alt="Restaurant" class="img-responsive"></a>

    <nav class="navbar">
        <a  href="<?php echo SITEURL; ?>res-login.php">LOGIN</a>
        <a  href="<?php echo SITEURL; ?>home.php">HOME</a>
        <a href="<?php echo SITEURL; ?>menu.php">MENU</a>
        <a class="active" href="<?php echo SITEURL; ?>Aboutus.php">ABOUT</a>
        <a href="<?php echo SITEURL; ?>contact.php">CONATACT US</a>
        <a href="<?php echo SITEURL; ?>order.php">ORDER NOW</a>
        
    </nav>
</header>

<!-- header section ends-->

<!-- about section starts  -->

<section class="about" id="about">

    <h3 class="sub-heading"> about us </h3>
    <h1 class="heading"> why choose us? </h1>

    <div class="row">

        <div class="image">
            <img src="images/back.png" alt="">
        </div>

        <div class="content">
            <h3>best food in the country</h3>
            <p>Our restaurant has started in 2015 . This is the best food Restaurant you can order your desired food and have it at your home. Our restaurant provides your home delivery and cash on delivery.</p>
            <p>We have many outlet statup is now in Ahmedabad.and we are planning to grow in many diffrent states like Mumbai, Rajasthan,Goa and many more. You will be always deliveed fresh food. You can contact us from Our website for any queries or you can go to our instagram, facebook or whats app.</p>
            <div class="icons-container">
                <div class="icons">
                    <i class="fas fa-shipping-fast"></i>
                    <span>free delivery</span>
                </div>
                <div class="icons">
                    <i class="fas fa-dollar-sign"></i>
                    <span>easy payments</span>
                </div>
                <div class="icons">
                    <i class="fas fa-headset"></i>
                    <span>24/7 service</span>
                </div>
            </div>
           
        </div>

    </div>

</section>

<!-- about section ends -->

</body>
</html>
