<?php
/*connect file*/
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin DashBoard</title>
     <!--Bootstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
     <!--Bootstrap Modal Link-->
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
     <!--Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS Link-->
    <link rel="stylesheet" href="../style.css">
    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
        }
        .footer{
            position: absolute;
            bottom: 0;
        }
        body{
            overflow-x:hidden;
        }
        .product_img{
            width:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first-child-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img class="logo" src="../images./logos.png" alt="">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link">Welcome Guest</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

        <!--second child-->
        <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
        </div>

        <!--second child-->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#">
                        <img src="../images/apple.jpeg" alt="" class="admin_image">
                    </a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="index.php?list_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="index.php?list_user" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1"></a>Logout</button>
                </div>
            </div>
        </div>

        <!--fourth child-->
        <div class="conatiner my-3">
            
            <?php
            if(isset($_GET['insert_category']))
            {
            include('insert_categories.php');
            }

            if(isset($_GET['insert_brand']))
            {
                include('insert_brands.php');
            }
            
            if(isset($_GET['view_products']))
            {
            
                include('view_products.php');
            }

            if(isset($_GET['edit_products']))
            {
            
                include('edit_products.php');
            }

            if(isset($_GET['delete_product']))
            {
            
                include('delete_product.php');
            }
            if(isset($_GET['view_categories']))
            {
            
                include('view_categories.php');
            }
            if(isset($_GET['view_brands']))
            {
            
                include('view_brands.php');
            }
            if(isset($_GET['edit_category']))
            {
            
                include('edit_category.php');
            }
            if(isset($_GET['edit_brand']))
            {
            
                include('edit_brand.php');
            }
            if(isset($_GET['delete_category']))
            {
            
                include('delete_category.php');
            }
            if(isset($_GET['delete_brand']))
            {
            
                include('delete_brand.php');
            }
            if(isset($_GET['list_orders']))
            {
            
                include('list_orders.php');
            }
            if(isset($_GET['delete_list_orders']))
            {
            
                include('delete_list_orders.php');
            }
            if(isset($_GET['list_payments']))
            {
            
                include('list_payments.php');
            }
            if(isset($_GET['list_user']))
            {
            
                include('list_user.php');
            }
            ?>
        </div>
            <!--last child-->
            <!--last child-->
            <!--include footer-->
    <?php
       include('../includes/footer.php');
    ?>
    </div>
    </div>
    </div>
     <!--Bootsrap JS Link-->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>