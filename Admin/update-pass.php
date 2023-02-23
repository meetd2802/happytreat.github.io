<?php include('partials/menu.php'); ?>

<div class="main-content">
    <h1>Change Password</h1>
    <br><br>

    <?php 
        if(isset($_GET['id']))
        {
            $id=$_GET['id'];
        }
    ?>

    <form action="" method="POST">
    <table class="tbl-small">
        <tr>
            <td>Old Password: </td>
            <td><input type="password"name="current_password" ></td>
        </tr>

        <tr>
            <td>New Password: </td>
            <td><input type="password" name="new_password"></td>
        </tr>

        <tr>
            <td>Confirm Password: </td>
            <td><input type="password" name="confirm_password"></td>
        </tr>

        <tr>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <td colspan="2"><input type="submit" name="submit" value="Change Password" class="btn-secondary"></td>
        </tr>
    </table>
    </form>

</div>

<?php

        //check whether submit button is click or not
        if(isset($_POST['submit']))
        {
            //echo "clicked";
            //1.get data
            $id=$_POST['id'];
            $current_password = md5($_POST['current_password']);
            $new_password = md5($_POST['new_password']);
            $confirm_password = md5($_POST['confirm_password']);
           
            //2.check id and passowrd exist
            $sql = "SELECT*FROM tbl_admin WHERE id=$id AND password='$current_password'";

            $res = mysqli_query($conn,$sql);

            if($res==TRUE)
            {
                $count=mysqli_num_rows($res);

                if($count==1)
                {
                    //user exist
                   // echo "user found";
                   if($new_password==$confirm_password)
                   {
                        //echo "password match";
                        $sql2 = "UPDATE tbl_admin SET
                        password='$new_password'
                        WHERE id=$id
                        ";

                        $res2 = mysqli_query($conn,$sql2);

                        if($res2==TRUE)
                        {
                            $_SESSION['change-pwd'] = "<div class='success'>password changed </div>";
                            header('location:http://localhost/restaurant/admin/mange-admin.php');
                        }
                        else
                        {
                            //display error message
                            $_SESSION['change-pwd'] = "<div class='error'>password not changed </div>";
                            header('location:http://localhost/restaurant/admin/mange-admin.php');

                        }
                   }
                   else
                   {
                    $_SESSION['pwd-not-match'] = "<div class='error'>password not match </div>";
                    header('location:http://localhost/restaurant/admin/mange-admin.php');
                   }
                }
                else
                {
                    $_SESSION['user-not-found'] = "<div class='error'>user not found </div>";
                    header('location:http://localhost/restaurant/admin/mange-admin.php');
                }
            }

            //3. current or new pass check 

            //4.update change pass

        }

?>

<?php include('partials/foot.php')?>