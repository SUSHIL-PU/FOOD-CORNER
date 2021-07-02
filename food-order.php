
<?php include('menu/menu.php'); ?>

<?php 
    //Checking food_id is set or not
    if(isset($_GET['food_id']))
    {
        $food_id = $_GET['food_id'];

        $sql = "SELECT * FROM food WHERE id=$food_id";
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            // fetching the row from the table
            $row = mysqli_fetch_assoc($res);

            $title = $row['title'];
            $price = $row['price'];
            $image_name = $row['image_name'];
        }
        else
        {
            //Redirect to the home page
            header('location:'.SITEURL);
        }
    }
    else
    {
        //Redirect to home page
        header('location:'.SITEURL);
    }
?>

<section class="background">
    <div class="container">
        
        <h3 class="text-center">Fill this form to get your order.</h3>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php 
                    
                        if($image_name=="")
                        {
                            echo "Image not Available.";
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo SITEURL; ?>static/images/foods/<?php echo $image_name; ?>" alt="selected food image" class="img-responsive">
                            <?php
                        }
                    
                    ?>
                    
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">

                    <p class="food-price">Rs. <?php echo $price; ?></p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">

                    <div class="order-label">Quantity</div>
                    <input type="number" name="qty" class="input-responsive" value="1" required>
                    
                </div>

            </fieldset>
            
            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="Enter your name" class="input-responsive" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="Phone no" class="input-responsive" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="mail id" class="input-responsive" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="Your Address" class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>

        </form>

        <?php 
 
            //CHeck whether submit button is clicked or not
            if(isset($_POST['submit']))
            {
                // To get the details from the form
                $food = $_POST['food'];
                $price = (int)$_POST['price'];
                $qty = (int)$_POST['qty'];

                $total = (float)$price * $qty; 

                $order_date = date("Y-m-d h:i:s a");

                $status = "Ordered";

                $customer_name = $_POST['full-name'];
                $customer_contact =(int)$_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];
                

                //Save the order details in database
                $sql2 = "INSERT INTO `order` VALUES(NULL, '$food', $price, $qty, $total, '$order_date', '$status', '$customer_name', $customer_contact, '$customer_email', '$customer_address')";
                
                $res2 = mysqli_query($conn, $sql2);

                //Cheking if query executed successfully or not
                if($res2)
                {
                    $_SESSION['food-order'] = "<div class='text-center'>Food Ordered Successfully.</div>";
                    header('location:'.SITEURL);
                }
                else
                {
                    $_SESSION['food-order'] = "<div class='text-center'>Failed to Order Food.</div>";
                    header('location:'.SITEURL);
                }

            }        
        ?>
    </div>
</section>

<?php include('menu/footer.php'); ?>