<?php     
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "food-order";  
 
$con = mysqli_connect($host, $user, $password, $db_name);  
if(mysqli_connect_errno())
{  
    die("Failed to connect with MySQL: ". mysqli_connect_error());  
}  
else
{
    //echo"conected";
}


//check wether submit button is click or not
if(isset($_POST['submit']))
{
    //get all details
    $full_name = $_POST['full_name'];
    $contact = $_POST['contact'];
    $subject = $_POST['subject'];

    //save order in database
    //create SQL to save the data 
    $sql2="INSERT INTO tbl_con SET
    full_name = '$full_name',
    contact = '$contact',
    subject = '$subject'
    ";
    
    //echo $sql2; die();
    
    //execute query
    $res2=mysqli_query($conn,$sql2);

    //check wether query execute or not
    if($res2==true)
    {
        //executed
        echo "<b>your response has been submited!<b>";
        //$_SESSION['order'] = "<div>food order sucessfully</div>";
    
    }
    else
    {
        echo "fail";
        //failed
       // $_SESSION['order'] = "<div>fail to order food</div>";
        //header('location:'.SITEURL);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy_Treats</title>
    <link rel="stylesheet" href="css/style_contact.css">
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
        <a  href="res-login.php">LOGIN</a>
        <a  href="home.php">HOME</a>
        <a  href="menu.php">MENU</a>
        <a  href="Aboutus.php">ABOUT</a>
        <a class="active" href="contact.php">CONATACT US</a>
        <a href="<?php echo SITEURL; ?>order.php">ORDER NOW</a>

    </nav>
</header>
</section>
<!--header section ends here-->
<!--contact section strats from here-->
<section class="contact">
    <div class="container">
            <form method="POST">
          
              <label for="fname">Your Full name</label>
              <input type="text"  name="full_name" placeholder="Your name..">
          
              <label for="lname">your contact:</label>
              <input type="text"  name="contact" placeholder="Enter you contact">
          
              <label for="subject">Subject</label>
              <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
          
              <input type="submit" value="Submit">
          
            </form>
          </div>
          </div>
</section>
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