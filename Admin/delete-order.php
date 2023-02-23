<?php

    include('../config/constants.php');

    //1.get the id of admin to be deleted
    $id = $_GET['id'];

    //2.create SQL Query to Delete Admin 
    $sql = "DELETE FROM tbl_order WHERE id=$id";

    //execute query
    $res = mysqli_query($conn,$sql);

    // check whether the query executed sucessfully or not
    if($res==TRUE)
    {
    
        //echo "order deleted";
        
        $_SESSION['delete'] = "Admin deleted successfully";
        header('location:http://localhost/restaurant/admin/manage-order.php');
    }
    else
    {
        //echo "fail to delete";
        $_SESSION['delete'] = "Admin not deleted successfully";
        header('location:http://localhost/restaurant/admin/manage-order.php');
    }
    //3. redirect to manage order page with message


?>