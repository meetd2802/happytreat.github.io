<?php include('partials/menu.php'); ?>

        <!-- main content section strats here-->
        <section class="main-content">
            <div class="wrapper">
            <h1>Manage Admin</h1>
            <br />
        
            <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);

                }

                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                    
                }

                if(isset($_SESSION['user-not-found']))
                {
                    echo $_SESSION['user-not-found'];
                    unset($_SESSION['user-not-found']);
                    
                }

                if(isset($_SESSION['pwd-not-match']))
                {
                    echo $_SESSION['pwd-not-match'];
                    unset($_SESSION['pwd-not-match']);
                    
                }

                if(isset($_SESSION['change-pwd']))
                {
                    echo $_SESSION['change-pwd'];
                    unset($_SESSION['change-pwd']);
                    
                }
            ?>
            <br><br>

            <!--button to add admin-->
            <a href="add-admin.php"class="btn-primary">Add Admin</a>
            
            <br /><br /><br />
            
            <table class="tbl-full">
                <tr>
                    <th>S.N</th>
                    <th>Full name</th>
                    <th>User Name</th>
                    <th>Actions</th>
                </tr>

                <?php 
                    $sql = "SELECT*from tbl_admin";
                    //execute the query
                    $res = mysqli_query($conn,$sql);

                    //check wether query is exequted or not
                    if($res==TRUE)
                    {
                        //count rows to check whether we have data in database or not
                        $count  = mysqli_num_rows($res);

                        $sn=1;
                        //check num of rows
                        if($count>0)
                        {
                            //we have data
                            while($rows=mysqli_fetch_assoc($res))
                            {
                                $id=$rows['id'];
                                $full_name=$rows['full_name'];
                                $username=$rows['username']; 

                                //display the values in our table
                                ?>

                                <tr>
                                    <td><?php echo $sn++;?></td>
                                    <td><?php echo $full_name;?></td>
                                    <td><?php echo $username;?></td>
                                    <td>
                                    <a href="<?php echo SITEURL;?>admin/update-pass.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                    <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Upadate Admin</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                    </tr>

                                <?php
                            }

                        }
                        else
                        {
                            //we dont have data
                        }
                    }                    
                ?>
                
            </table>
            <div class="clearfix"></div>
            </div>
        </section>
        <!-- main content section ends here-->
<?php include('partials/foot.php')?>

        