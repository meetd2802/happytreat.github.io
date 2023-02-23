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
    if (isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tbl_login (username, password)
    VALUES ( '$username', '$password')";
    if(mysqli_query($con, $sql))
    {
   // echo "Records added successfully.";
    }
    else
    {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
    }
 
// Close connection
mysqli_close($con);
            }

?>  

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy_Treats</title>

        
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
    :root{
    --green:#27ae60;
    --black:#192a56;
    --light-color:#666;
    --box-shadow:0 .5rem 1.5rem rgba(0,0,0,.1);
}

*{
    font-family: 'Nunito', sans-serif;
    margin:0; padding:0;
    box-sizing: border-box;
    text-decoration: none;
    outline: none; border:none;
    text-transform: capitalize;
    transition: all .2s linear;
}
.container
{
   /*border: 1px solid black ;*/
    width: 80%;
    margin: 0 auto;
    padding: 1%;
}

.img-responsive
{
    width: 100%;
}

.txt-right
{
    text-align: right;
}

.txt-center
{
    text-align: center;
}

.clearfix
{
    clear: both;
    float: none;
}

.btn-primary{
    background-color:white;
    padding: 1%;
    color: black;
    text-decoration: none;
    font-weight: bold;
}

.btn-primary:hover{
    background-color: blueviolet;
}

.img-responsive
{
    width: 100%;
}
html{
    font-size: 62.5%;
    overflow-x: hidden;
    scroll-padding-top: 5.5rem;
    scroll-behavior: smooth;
}

header{
    position: fixed;
    top:0; left: 0; right:0;
    background:lightsteelblue;
    padding:1rem 7%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    z-index: 1000;
    box-shadow: var(--box-shadow);
}

.logo{
    width: 10%;
    float: left;
}
header .logo{
    color:var(--black);
    font-size: 2.5rem;
    font-weight: bolder;
}

header .logo i{
    color:var(--green);
}

header .navbar
{
    padding: 2%;
}
header .navbar a{
    font-size: 1.7rem;
    border-radius: .5rem;
    padding:.5rem 1.5rem;
    color:var(--light-color);
}

header .navbar a.active,
header .navbar a:hover{
    color:#fff;
    background: var(--green);
}

header .icons #menu-bars{
    display: none;
}

/*css for login*/
.log{
    font-size: large;
    padding: 1%;
}
.login{
    width: 30%;
    height: 20%;
    border: 1px solid black;
    margin: 10% auto;
    padding: 2%;
}


/*CSS for social margin: 50px 10px;*/

social .so-container
{
    padding: -1%;
}
.Social
{
    margin: 50px 10px;
    padding: auto;
}

.Social ul
{
    margin-top: -20%;
    list-style-type: none;
}

.Social ul li
{
    display: inline;
    padding: 1%;
}


/* CSS for FOOTER */

.footer
{
    text-align: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    font-size: x-large;
    font-weight: bold;
    margin-top: -18%;
    color: black;
}
</style>

<!--header section starts here-->
<section class="header">
<header>

    <a href="#" class="logo"><img src="images/back.png" alt="Restaurant" class="img-responsive"></a>

    <nav class="navbar">
        <a class="active" href="res-login.php">LOGIN</a>
        <a href="home.php">HOME</a>
        <a href="menu.php">MENU</a>
        <a href="Aboutus.php">ABOUT</a>
        <a href="contact.php">CONATACT US</a>
        <a href="order.php">ORDER NOW</a>

    </nav>
</header>
</section>
<!--header section ends here-->

<section class="log">
    <div class="login">
        <h1 class="txt-center">LOGIN</h1>
        <br> <br>
    
    <form method="POST"  action="home.php">
    Enter Userame: <br>
    <input type="text" name="username"> <br><br>
    Enter your Password: <br>
    <input type="password" name="password"> <br><br>
    or
    <a href="reg.php">REGISTER NOW</a><br><br>
    <input type="submit" name="submit" value="LOGIN" class="btn-primary"  >
    </form>
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

