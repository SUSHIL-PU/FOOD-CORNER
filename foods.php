
<?php include('menu/menu.php'); ?>

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php 
            $sql = "SELECT * FROM food WHERE active='Yes'";

            $res=mysqli_query($conn, $sql);

            //To count the number of rows
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                // To fetch each row one by one 
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php 
                                if($image_name=="")
                                {
                                    echo "Image not Available..";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>static/images/foods/<?php echo $image_name; ?>" alt="foods image" class="img-responsive">
                                    <?php
                                }
                            ?>                            
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">Rs.<?php echo $price; ?></p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>

                            <a href="<?php echo SITEURL; ?>food-order.php?food_id=<?php echo $id; ?>"><h2>Order Now</h2></a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                echo "Food not found..";
            }
        ?>   
    </div>
</section>

<?php include('menu/footer.php'); ?> 