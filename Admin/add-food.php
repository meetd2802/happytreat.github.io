<?php include('../Admin/partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
    <h1>Add food</h1>
    <br><br>

    <?php 
        if(isset($_SESSION['upload']))
        {
            echo $_SESSION['upload'];
            unset($_SESSION['upload']); 
        }
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <table class="tbl-full">
            <tr>
                <td>Title:</td>
                <td>
                    <input type="text" name="title" placeholder="Title of the food">
                </td>
            </tr>
            <tr>
                <td>Description:</td>
                <td>
                    <textarea name="description" id="30" cols="30" rows="10" placeholder="Description of the food"></textarea>
                </td>
            </tr>
            <tr>
                <td>Price: </td>
                <td>
                    <input type="number" name="price">
                </td>
            </tr>
            <tr>
                <td>Select image: </td>
                <td>
                    <input type="file" name="image"  >
                </td>
            </tr>
            <tr>
                 <td>Featured: </td>
                 <td>
                    <input type="radio" name="featured" value="yes">YES
                    <input type="radio" name="featured" value="no">NO
                 </td>
            </tr>
         <tr>
            <td>Active:</td>
            <td>
                <input type="radio" name="active" value="yes">YES
                <input type="radio" name="active" value="no">NO
            </td>
         </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>
            </tr>

        </table>
    </form>

<?php 
    //check wether the button is clicked or not
    if(isset($_POST['submit']))
    {
        //Add the food in database
        //echo "clicked";
        //1.get the data from form
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        
        //check whether radio button for featured and active are check or not
        if(isset($_POST['featured']))
        {
            $featured = $_POST['featured'];
        }
        else
        {
            $featured = "NO";//setting default value
        }
        if(isset($_POST['active']))
        {
            $active = $_POST['active'];
        }
        else
        {
            $active = "NO";//setting the default value
        }


        //2.upload the image if selected
        //check wether the select image is clicked or not and upload image only if image is selected
        if(isset($_FILES['image']['name']))
        {
            //get the detail of image selected
            $image_name = $_FILES['image']['name'];

            //check wether image is selected or not and upload image only if selected
            if($image_name!="")
            {
                //image selected
                //A.rename the image
                //get the extension of selected(jpg,png,gif,etc.)

                $ext = end(explode('.',$image_name));
                // create new image name
                $image_name = "Food-Name-".rand(0000,9999).".".$ext;
                
                //b.upload the image
                //get the src path

                //source path is the curerent location of the image
                $src = $_FILES['image']['tmp_name'];

                //destination path for the image to be uploaded
                $dst = "../images/food/".$image_name;

                //finally uplaod tthe food image
                $upload = move_uploaded_file($src,$dst);

                //check wether the image upload or not
                if($upload==false)
                {
                    //failed to upload
                    //redirect to add food page
                    $_SESSION['upload'] = "<div class='error'>failed to upload image.</div>";
                    header('location:http://localhost/restaurant/admin/add-food.php');
                    //stop the process
                    die();
                }
            }
        }
        else
        {
            $image_name="";//setting defualt value as blank
        }

        //3.insert into data base

        //create a sql query to save or add food
        //for numerical value we do not need pass value inside quote but for string value quotes is compulsary
        $sql = "INSERT INTO tbl_food set 
            title='$title',
            description='$description',
            price='$price',
            img_name='$image_name',
            featured='$featured',
            active='$active'
        ";

        //execute query
        $res2 = mysqli_query($conn,$sql);
        //check data inserted or not
        //4.redirect the page to manage admin page

        if($res2 == true)
        {
            //data inserted
            $_SESSION['add'] = "<div class='success'>Food added sucessfully.</div>";
            header('location:http://localhost/restaurant/admin/manage-food.php');
        }
        else
        {
            //fail to insert data
            $_SESSION['add'] = "<div class='error'>Failed to Add  Food.</div>";
            header('location:http://localhost/restaurant/admin/manage-food.php');

        }

        

    }
?>

    </div>
</div>
<?php include('../Admin/partials/foot.php')?>
 