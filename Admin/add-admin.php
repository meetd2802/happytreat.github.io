<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>
        <br>
        <?php 
           if(isset($_SESSION['add']))
           {
               echo $_SESSION['add'];
               unset($_SESSION['add']);
           }
        ?>
        <form action="" method="POST">

        <table>
            <tr>
                <td>Name: </td>
                <td><input type="text" name="full_name" ></td>
            </tr>

            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" ></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" ></td>
            </tr>

            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Add Admin" class="btn-secondary"></td>
            </tr>
        </table>

        </form>
    </div>
</div>

<?php include('partials/foot.php') ?>

<?php
    //process the value from form and save in database
    //check whether the button is clicked or not
    if(isset($_POST['submit']))
    {
        //button clicked
        //echo "button clicked";

        //get data from form
       $full_name = $_POST['full_name'];
       $username = $_POST['username'];
       $password = md5($_POST['password']);//password Encryption with md5

        //SQL Query to save database
    $sql = "INSERT INTO tbl_admin set
    full_name='$full_name',
    username='$username',
    password='$password'
    ";

    $res = mysqli_query($conn,$sql);
    //or die(mysqli_error());
    
    //4. check data is inserted or not
    if($res==TRUE)
    {
        //echo "data inserted";
        // create a session variable to display message
        $_SESSION['add'] = "Admin addded sucessfully";
        //Redirect page
        header("location:http://localhost/restaurant/admin/mange-admin.php");
    }
    else
    {
        //echo "not inserted";
        // create a session variable to display message
        $_SESSION['add'] = "failed to add admin";
        //Redirect page
        header("location:http://localhost/restaurant/admin/mange-admin.php");
    }
}
?>


