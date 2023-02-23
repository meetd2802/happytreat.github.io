<?php include('../Admin/partials/menu.php'); ?>

<div class="main-content">
    <div class="">
        <h1>Update admin</h1>

        <br><br>
        <?php 
            //1.get id of selected admin
            $id=$_GET['id'];

            //2.create sql query
            $sql="SELECT*FROM tbl_admin WHERE id=$id";

            //exectute query
            $res=mysqli_query($conn,$sql);

            //check query execute or note
            if($res==TRUE)
            {
                $count = mysqli_num_rows($res);
                //check admin data is or not
                if($count==1)
                {
                    //echo "admin available";
                    $row = mysqli_fetch_assoc($res);
                    $full_name = $row['full_name'];
                    $username = $row['username'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }

            }

        ?>
        <form action="" method="POST">
            
        <table>
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
                </tr>

                <tr>
                    <td colspan="2"><input type="hidden" name="id" value="<?php echo $id; ?>"> <input type="submit" name="submit" value="Update Admin" class="btn-secondary"></td>
                </tr>
        </table>
        </form>
    </div>

</div>

<?php 

        //check whether the submit is click or not
        if(isset($_POST['submit']))
        {
           // echo "clicked";
           // get all value from form to update
        echo $id = $_POST['id'];
        echo $full_name = $_POST['full_name'];
        echo $username =$_POST['username'];

        //create a sql query to update admin
        $sql = "UPDATE tbl_admin SET
        full_name = '$full_name',
        username = '$username'
        WHERE id='$id'
        ";

        //execute query
        $res = mysqli_query($conn,$sql);

        //check
        if($res==TRUE)
        {
            $_SESSION['update'] = "Admin update successfully";
            header('location:http://localhost/restaurant/admin/mange-admin.php');
        }
        else
        {
            $_SESSION['update'] = "Admin update fail successfully";
            header('location:http://localhost/restaurant/admin/mange-admin.php');
        }

    }
?>

<?php include("../Admin/partials/foot.php");?>