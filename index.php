<?php 
    include('menu/menu.php');
?>


<!DOCTYPE html>
<html lang = "en">
    <head>
        <title>FOOD CORNER</title>
        <link rel = "stylesheet" href="static/css/custom.css">
    </head>
    <body>
    
        <section class="food_corner">
            <div class="food_title">
                <h1>FOOD CORNER ...THE FOOD YOU LOVE</h1>
                <P>A fast food restaurant, also known as a quick service restaurant within the industry, is a specific type of restaurant that serves fast food cuisine and has minimal table service.
                </P>
            </div>
        </section>

<?php 
    if(isset($_SESSION['food-order']))
    {
        echo $_SESSION['food-order'];
        unset($_SESSION['food-order']);
    }
?>
        
        
        <section class="product">
            <div class="product_list_item">
                <img src="static/images/burger.jfif" alt="picture  of fast food avaiable">
                <h2 class="product_heading">
                    Burger
                </h2>
                <p>A hamburger is a food, typically considered a sandwich, consisting of one or more cooked patties of ground meat, usually beef, placed inside a sliced bread roll or bun. The patty may be pan fried, grilled, smoked or flame broiled.</p>
            </div>

            <div class="product_list_item">
                <img src="static/images/pizza.jfif" alt="avaiable pizza">
                <h2 class="product_heading">
                    Pizza
                </h2>
                <p>Pizza is a savory dish of Italian origin consisting of a usually round, flattened base of leavened wheat-based dough topped with tomatoes, cheese, and often various other ingredients, which is then baked at a high temperature, traditionally in a wood-fired oven. A small pizza is sometimes called a pizzetta.
                </p>
            </div>


            <div class="product_list_item">
                <img src="static/images/thali.jfif" alt="a full thali">
                <h2 class="product_heading">
                    Thali
                </h2>
                <p>Thali the meal refers to many different dishes (both vegetarian and non-vegetarian), served in small bowls called (Katori in Hindi) arranged on a Thali, or a platter. A flatbread, rice, pickle, salad, and dessert are also included, as is bread (like chapatis).
                </p>
            </div>
        </section>
        
        <?php include('menu/footer.php') ?>

    </body>
</html>

