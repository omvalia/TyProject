<?php
/*connect file*/
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website using PHP and MySQL</title>
    <!--Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS Link-->
    <link rel="stylesheet" href="style.css">
    <style>

    </style>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first-child-->
    <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <img src="./images/logos.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="./users_area/user_registeration.php">Register</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item()?></sup></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Total Price: <?php total_cart_price()?>/-</a>
            </li>
        </ul>
        <form class="d-flex" action="" method="get">
            <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
            <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
        </form>
        </div>
    </div>
    </nav>

    <!-- calling cart-->
    <?php
        cart();
    ?>
    
    <!--second child-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <ul class="navbar-nav me-auto">
            <?php
                if(!isset($_SESSION['username'])){
                    echo"
                    <li class='nav-item'>
                    <a class='nav-link' href='#'>Welcome Guest</a>
                </li>";
                }else{
                    echo"<a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>";
                }
                if(!isset($_SESSION['username'])){
                    echo "<a class='nav-link' href='./users_area/user_login.php'>Login</a>";
                }else{
                    echo"<a class='nav-link' href='./users_area/logout.php'>Logout</a>";
                }
            ?>
        </ul>
    </nav>

    <!-- third child-->
    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communication is at the heart of e-commerce and community</p>
    </div>

    <!-- fourth child-->
    <div class="row px-1">
        <!--products-->
        <div class="col-md-10">
            <div class="row">
                <!--fetching products-->
                <?php
                //calling function from functions/common_function.php file
                    getproducts();
                    search_product();
                    //get_unique_categories();
                ?>
                <!--row end-->
            </div>  
            <!--column end-->
        </div>
        <!-- sidenav-->
        <div class="col-md-2 bg-secondary p-0">
            <!--Brands to be displayed-->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                </li>
                <?php
                    getbrands();
                    //get_unique_brands();
                ?>
           </ul>
           
           <!--Categories to be displayed-->
           <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                </li>
                <?php
                    getcategories();
                ?>
           </ul>
        </div>
    </div>

    <!--last child-->
    <div class="bg-info p-3 text-center">
       <p>All Rights Reserved &copy - Designed by Om Valia - 2022</p> 
    </div>
    </div>
    


    <!--Bootsrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>