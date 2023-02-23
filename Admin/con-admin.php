<?php include('../config/constants.php');

?>
<html>
    <head>
        <title>Login - food order system</title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        
        <div class="login">
            <h1 class="txt-center">Login</h1>
            <br><br>
            <?php
            if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                    
                }

                if(isset($_SESSION['no-login']))
                {
                    echo $_SESSION['no-login'];
                    unset($_SESSION['no-login']);
                    
                }
            ?>
                <br><br>
            <!--Login form starts here-->
            <form action="" method="POST" class="txt-center">
            Username:<br>
            <input type="text" name="username" placeholder="Enter username"><br><br>
            Password:<br>
            <input type="password" name="password" placeholder="Enter password"><br><br>
            
            <input type="submit" name="submit" value="login" class="btn-primary"><br><br>
            </form>
            <!--login form ends here-->
            <p class="txt-center">Created By - <a href="#">Happy Treats</a></p>

        </div>

    </body>
</html>

<?php
    //check whether submit button is click or not
    if(isset($_POST['submit']))
    {
        //process of login
        //1.get the data from login form
         $username = $_POST['username'];
         $password = md5($_POST['password']);

         //2.sql to check whether the user name or password exist or not
         $sql="SELECT*FROM tbl_admin WHERE username='$username' AND password='$password'";

        //3. execute query
        $res = mysqli_query($conn,$sql);

        //4.count rows to check user exist or not
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            //user available
            $_SESSION['login'] = "<div class='success'>Login Sucessfull</div>";

            $_SESSION['user'] = $username;
            header('location:http://localhost/restaurant/admin/');
        }
        else
        {
            //user not available
            $_SESSION['login'] = "<div class='error' class='txt-center'>Username or Password dont match</div>";
            header('location:http://localhost/restaurant/admin/con-admin.php');
        }
    }

?>