<?php
    // include constant page
    include('../config/constants.php');
    //echo "delete food";

    if(isset($_GET['id']) && isset($_GET['img_name']))
    {
        //process to delete
        //echo "Process to Delete";

        //1.get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['img_name'];

        //2.remove image if availbale
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

        //3.delete food from database

        $sql = "DELETE FROM tbl_food WHERE id=$id";

        //execute the query
        $res = mysqli_query($conn,$sql);

        //check wether the query executed or not and set the session message
        if($res==true)
        {
            //food deleted
            $_SESSION['delete']="<div class='success'>Food Deleted Sucessfully.</div>";
            header('location:http://localhost/restaurant/admin/manage-food.php');
        }
        else
        {
            //fail to delete
            $_SESSION['delete']="<div class='error'>Food Delete fail.</div>";
            header('location:http://localhost/restaurant/admin/manage-food.php');

        }
        //4.redirect to manage food

    }
    else
    {
        //redirect to manage food
        //echo "Redirect";
        $_SESSION['unauthorize'] = "<div class='error> Unauthorised Access.</div>";
        header('location:http://localhost/restaurant/admin/manage-food.php');
    }
?>