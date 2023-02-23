<?php include('../Restaurant/config/constants.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Food Website Design Tutorial</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity-"sha384-BVYiiSIFeKidGmJRAkyouHAHRg320mUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN11RsVXV4nD0JutinGas1CJuC7uwjduW9SVxLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin-"anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"integrity-"sha384-Tc5101b027qvyj SMfHjOMaLkfuWVXZxUPCJA712mCWNIpG9mGCD8vGNIOPD7Txa" crossorigin="anonymous"></script>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/home.css">

</head>
<body>
    <style>
        body
        {
            background-color:lightsteelblue;
            color: black;
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
        <a class="active" href="<?php echo SITEURL; ?>home.php">HOME</a>
        <a href="<?php echo SITEURL; ?>menu.php">MENU</a>
        <a href="<?php echo SITEURL; ?>Aboutus.php">ABOUT</a>
        <a href="<?php echo SITEURL; ?>contact.php">CONATACT US</a>
        <a href="<?php echo SITEURL; ?>order.php">ORDER NOW</a>

    </nav>
</header>

<!-- header section ends-->

<?php 
  if(isset($_SESSION['order']))
  {
      echo $_SESSION['order'];
      unset($_SESSION['order']);
  }
?>

<!-- home section starts  -->
<section class="slider">
    <div class="rs-text">
        <h2>Our Restaurant</h2>
    </div>
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li>
        </ol>
      
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="Images/res1.jpg" alt="" class="img-responsive">
            <div class="carousel-caption">
                
            </div>
          </div>
          <div class="item">
            <img src="Images/2016-08-30-serafina-002.0.0 (1).jpg" alt="" class="img-responsive">
            <div class="carousel-caption">
              
            </div>
          </div>

          <div class="item">
            <img src="Images/indian-food-vancouver (1).jpg" alt="" class="img-responsive">
            <div class="carousel-caption">
             
            </div>
          </div>
          <div class="item">
            <img src="Images/istockphoto-1131538033-170667a (1).jpg" alt="" class="img-responsive">
            <div class="carousel-caption">
             
            </div>
          </div>
          ...
        </div>

      
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

</section>
<!-- home section ends -->

<!--social starts from here-->
<section class="Social">
    <div class="so-container txt-center">
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




















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<?php
      if(isset($_SESSION['login']))
      {
      echo $_SESSION['login'];
      unset($_SESSION['login']);
                            
    }
        
?>

</body>
</html>