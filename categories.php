
<?php include('menu/menu.php'); ?>

<section class="categories">
    <h2 class="text-center">Available Categories</h2>

    <div class="img-container">
        <?php 

            //Display all the cateories that are active
            $sql = "SELECT * FROM category WHERE active='Yes'";
            
            $res = mysqli_query($conn, $sql);

            //To count the number of Rows
            $count = mysqli_num_rows($res);

            if($count>0)
            {
                //To get every row of the table Category
                while($row=mysqli_fetch_assoc($res))
                {
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
                    ?>
                    
                    <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>">
                        <div class="box-3">
                            <?php 
                                if($image_name=="")
                                {
                                    echo "Image not found";
                                }
                                else
                                {
                                    ?>
                                    <img src="<?php echo SITEURL; ?>static/images/<?php echo $image_name; ?>" alt="food item" class="img-responsive">
                                    <?php
                                }
                            ?>
                            
                            <h3><?php echo $title; ?></h3>
                        </div>
                    </a>

                    <?php
                }
            }
            else
            {
                echo "Category not found.";
            }
        
        ?>
    </div>
</section>

<?php include('menu/footer.php'); ?>