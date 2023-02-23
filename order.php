<?php include('../Restaurant/config/constants.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy_Treats</title>
    <link rel="stylesheet" href="css/order.css">
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
<!--header section starts here-->
<section class="header">
<header>

    <a href="#" class="logo"><img src="images/back.png" alt="Restaurant" class="img-responsive"></a>

    <nav class="navbar">
        <a  href="<?php echo SITEURL; ?>res-login.php">LOGIN</a>
        <a  href="<?php echo SITEURL; ?>home.php">HOME</a>
        <a  href="<?php echo SITEURL; ?>menu.php">MENU</a>
        <a  href="<?php echo SITEURL; ?>Aboutus.php">ABOUT</a>
        <a  href="<?php echo SITEURL; ?>contact.php">CONATACT US</a>
        <a class="active" href="<?php echo SITEURL; ?>order.php">ORDER NOW</a>       
    </nav>
</header>
</section>
<!--header section ends here-->

<?php
    //check wether the food id is set or not 
    if(isset($_GET['food_id']))
    {
        //get the food id and details of the selected folder
        $food_id = $_GET['food_id'];

        //get the details of the selected food
        $sql="SELECT*FROM tbl_food WHERE id=$food_id";

        //execute query
        $res=mysqli_query($conn,$sql);

        //count rows 
        $count = mysqli_num_rows($res);

        //check wether the data is available or not
        if($count==1)
        {
            //we have data
            //get data from database
            $row = mysqli_fetch_assoc($res);
            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['img_name'];
        }
        else
        {
            //foor not available
            //redirect
            header('location:'.SITEURL);
        }
    }
    else
    {
        //redirect to home page
        header('location:'.SITEURL);
    }
?>



    <!-- fOOD sEARCH Section Starts Here -->
    <section class="order-now">
        
        <div class="container"> 
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
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
                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="" width="" class="img-responsive" >
                        <?php
                    }
                    ?>
                    
                </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;  ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>" >
                        <p class="food-price">Rs:- <?php echo $price;  ?></p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>" >

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name"  class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact"  class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email"  class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10"  class="input-responsive" required></textarea>
                    
                    Payment:
                    
                    <input type="radio" name="pay" required>cash on delivery <br>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>
            
            <?php
                //check wether submit button is click or not
                if(isset($_POST['submit']))
                {
                    //get all details
                    $food = $_POST['food'];
                    $price =$_POST['price'];
                    $qty =$_POST['qty'];

                    $total = $price * $qty;

                    $order_date = date("Y-m-d h:i:sa");//order date

                    $status= "Ordered"; //ordered,on delivery, delivered, cancle delivery

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_email = $_POST['email'];
                    $customer_address = $_POST['address'];

                
                    //save order in database
                    //create SQL to save the data 
                    $sql2="INSERT INTO tbl_order SET
                    food = '$food',
                    price = $price,
                    qty = $qty,
                    total = $total,
                    order_date ='$order_date',
                    status = '$status',
                    customer_name = '$customer_name',
                    customer_contact = '$customer_contact',
                    customer_email = '$customer_email',
                    customer_address = '$customer_address'
                    ";
                    
                    //echo $sql2; die();
                    
                    //execute query
                    $res2=mysqli_query($conn,$sql2);

                    //check wether query execute or not
                    if($res2==true)
                    {
                        //executed
                        echo "<b>your Food has been ordered successfully will be dilivered to you soon!<b>";
                        //$_SESSION['order'] = "<div>food order sucessfully</div>";
                    
                    }
                    else
                    {
                        //failed
                        $_SESSION['order'] = "<div>fail to order food</div>";
                        header('location:'.SITEURL);
                    }
                }
            ?>
            

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

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
