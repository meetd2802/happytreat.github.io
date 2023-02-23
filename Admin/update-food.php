<?php include('partials/menu.php'); ?>

<?php
if(isset($_SESSION['upload']))
{
    echo $_SESSION['upload'];
    unset($_SESSION['upload']); 
}

if(isset($_SESSION['update']))
        {
            echo $_SESSION['update'];
            unset($_SESSION['update']); 
        }
?>
<?php
//check wether id is set or not
if(isset($_GET['id']))
{
    //get all the details
    $id = $_GET['id'];

    //SQL query to get the selected folder
    $sql2 = "SELECT * FROM tbl_food WHERE id=$id";
    //execute the query
    $res2 = mysqli_query($conn,$sql2);
    //get the value 
    $row2 = mysqli_fetch_assoc($res2);

    // get the individual values of selected folder
    $title = $row2['title'];
    $description = $row2['description'];
    $price = $row2['price'];
    $current_image = $row2['img_name'];
    $featured = $row2['featured'];
    $active = $row2['active'];
}
else
{
    //redirect
    header('location:http://localhost/restaurant/admin/manage-food.php');
}
?>

<div class="main-content">
    <div class="wrapper">
    <h1>Update Food</h1>
    <br><br>

    <form action="" method="POST" enctype="multipart/form-data">

    <table class="tbl-full">
    <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" value="<?php echo $title ?>" placeholder="Title of the food">
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" id="30" cols="30" rows="10" placeholder="Description of the food"><?php echo $description ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price" value="<?php echo $price ?>">
                </td>
            </tr>
            <tr>
                <td>Current image: </td>
                <td>
                    <?php
                        if($current_image == "")
                        {
                            //image not available
                            echo "<div>Image not available.</div>";
                        }
                        else
                        {
                            //available
                            ?>
                            <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" width="150px">
                            <?php
                        }
                    ?>
                </td>
                
            <tr>
                <td>Select New image: </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>

            <tr>
                 <td>Featured: </td>
                 <td>
                    <input <?php if($featured=="Yes") {echo "checked";} ?> type="radio" name="featured" value="yes">YES
                    <input <?php if($featured=="No") {echo " not checked";} ?> type="radio" name="featured" value="no">NO
                 </td>
            </tr>
         <tr>
            <td>Active:</td>
            <td>
                <input <?php if($active=="yes") {echo "checked";} ?> type="radio" name="active" value="yes">YES
                <input <?php if($active=="yes") {echo " not checked";} ?> type="radio" name="active" value="no">NO
            </td>
         </tr>
            <tr>
                <td>
                    <input type="hidden" name="id" value="<?php  echo $id; ?>" >
                    <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                    <input type="submit" name="submit" value="Update Food" class="btn-secondary">
                </td>
            </tr>

    </table>
    </form>

    <?php
        if(isset($_POST['submit']))
        {
            //echo "button clicked";
            
            //1.collect all details from form
            $id =$_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $current_image = $_POST['current_image'];
            $featured = $_POST['featured'];
            $active = $_POST['active'];

            //2.upload the image

            //check wether the upload button is clicked or not
            if(isset($_FILES['images']['name']))
            {
                $image_name =$_FILES['image']['name'];

                //check wether the file is avialable or not
                if($image_name!=="")
                {
                    //image is available
                    //rename the image
                    $ext =end(explode('.',$image_name));
                    $image_name = "Food-Name-".rand(0000,9999).'.'.$ext;

                    //get the source path and destination path
                    $src_path = $_FILES['image']['name'];
                    $des_path ="../images/food/".$image_name;

                    //upload image
                    $upload = move_uploaded_file($src_path,$des_path);

                    //check upload or not
                    if($upload==false)
                    {
                        $_SESSION['upload'] = "<div> Failed to upload new image</div>";
                        //redirect
                        header('location:http://localhost/restaurant/admin/manage-food.php');
                        die();
                    }
                    //3.remove the image
                    if($image_name!="")
        {
            //it has image and need to remove folder
            //get the image path
            $path = "../images/food/".$image_name;

            //remove image file from folder
            $remove = unlink($path);

            //check wether the image is removed or not
            if($remove==false)
            {
                //failed to remove image
                $_SESSION['upload']="<div class='error'>failed to remove file.</div>";

                //redirect to manage food
                header('location:http://localhost/restaurant/admin/manage-food.php');
                //stop the process 
                die();
            }
        }
                }
            }
            //4.update food in database 
            $sql3 = "UPDATE tbl_food SET
            title ='$title',
            description ='$description',
            price = $price,
            image_name ='$image_name',
            featured ='$featured',
            active ='$active'
            WHERE id=$id
            ";
            //execute the query
            $res3 = mysqli_query($conn,$sql3);

            if($res3==true)
            {
                //food updated
                $_SESSION['upload'] = "<div>Food Updated sucessfully</div>";
                header('location=http://localhost/restaurant/admin/index.php');
            }
            else
            {
                //fail
                $_SESSION['upload'] = "<div>Fail to Updated </div>";
                header('location=http://localhost/restaurant/admin/manage-food.php');

            }

        }
    ?>

    </div>

</div>
<?php include('partials/foot.php'); ?>