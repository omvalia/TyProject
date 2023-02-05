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
    <?php
       include('./includes/navbar.php');
    ?>

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