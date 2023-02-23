<?php include('../Admin/partials/menu.php');?>

        <!-- main content section strats here-->
        <section class="main-content">
            <div class="wrapper">
            <h1>DASHBOARD</h1>
            <br><br>
            <?php
                        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                            
                        }
        
            ?>
            <br><br>
            <div class="col-4 txt-center">
            <?php    
            //sql query
                $sql = "SELECT * FROM tbl_food";
                $res=mysqli_query($conn,$sql);  
                $count = mysqli_num_rows($res);

            ?>    
                <h1><?php echo $count; ?></h1>
                <br>
                Foods
            </div>

            <div class="col-4 txt-center">
            <?php    
            //sql query
                $sql2 = "SELECT * FROM tbl_order";
                $res2=mysqli_query($conn,$sql2);  
                $count = mysqli_num_rows($res2);

            ?>    
                <h1><?php echo $count; ?></h1>
                <br>
                Total Orders
            </div>

            <div class="col-4 txt-center">
                <?php
                //sql query
                //aggrigate function in sql
                $sql4 ="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";

                //execute the query
                $res4 = mysqli_query($conn,$sql4);

                $row4 = mysqli_fetch_assoc($res4);
                
                //get total revenue
                $total_revenue = $row4['Total'];
                
                ?>
                <h1>Rs:-<?php echo $total_revenue ?></h1>
                <br>
                Revenue Genrated
            </div>
            <div class="clearfix"></div>
            </div>
        </section>
        <!-- main content section ends here-->

<?php 
include('../Admin/partials/foot.php');
?>