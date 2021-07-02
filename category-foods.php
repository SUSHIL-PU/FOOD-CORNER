
<?php include('menu/menu.php'); ?>

<?php 
    //Checking category_id is set or not
    if(isset($_GET['category_id']))
    {
        $category_id = $_GET['category_id'];

        $sql = "SELECT title FROM category WHERE id=$category_id";

        $res = mysqli_query($conn, $sql);

        //Getting the value from Database as associative string array
        $row = mysqli_fetch_assoc($res);

        $category_title = $row['title'];
    }
    else // if category_id is not available
    {
        //Redirect to Home page
        header('location:'.SITEURL);
    }
?>


<section class="text-center">
    <div class="container">
        
        <h2>Foods on <a href="#" class="text-white">"<?php echo $category_title; ?>"</a></h2>

    </div>
</section>

<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php 
        
            //To get the foods based on category_id
            $sql2 = "SELECT * FROM food WHERE category_id=$category_id";

            $res2 = mysqli_query($conn, $sql2);

            $noOfRows = mysqli_num_rows($res2);

            if($noOfRows>0)
            {
                // To take the row one by one
                while($row2=mysqli_fetch_assoc($res2))
                {
                    $id = $row2['id'];
                    $title = $row2['title'];
                    $price = $row2['price'];
                    $description = $row2['description'];
                    $image_name = $row2['image_name'];
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
                                    <img src="<?php echo SITEURL; ?>static/images/foods/<?php echo $image_name; ?>" alt="food image" class="img-responsive">
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

                            <a href="<?php echo SITEURL; ?>food-order.php?food_id=<?php echo $id; ?>">Order Now</a>
                        </div>
                    </div>

                    <?php
                }
            }
            else
            {
                echo "Food not Available.";
            }
        
        ?>        

    </div>
</section>

<?php include('menu/footer.php'); ?>