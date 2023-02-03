<?php
/*connect file*/
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php $_SESSION['username'] ?></title>
    <!--Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS Link-->
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x:hidden;
        }
        .profile_img{
            width:90%;
            margin:auto;
            display:block;
            /*height:100%;*/
            objech-fit:contain;
        }
        .edit_img{
            width:100px;
            height:100px;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <!--navbar-->
    <div class="container-fluid p-0">
        <!--first-child-->
    <nav class="navbar navbar-expand-lg bg-info">
    <div class="container-fluid">
        <img src="../images/logos.png" alt="" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="../display_all.php">Products</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="profile.php">My account</a>
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
        <form class="d-flex" action="../search_product.php" method="get">
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
                echo "<a class='nav-link' href='user_login.php'>Login</a>";
            }else{
                echo"<a class='nav-link' href='logout.php'>Logout</a>";
            }
            ?>
        </ul>
    </nav>

    <!-- third child-->
    <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communication is at the heart of e-commerce and community</p>
    </div>

    <!--fourth child-->
    <div class="row">
        <div class="col-md-2">
            <div class="col-md-10">
            <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item bg-info">
                <a class="nav-link text-light" href="#"><h4>Your Profile</h4></a>
                </li>

                <?php
                   $username=$_SESSION['username'];
                   $user_image="Select * from `user_table` where username='$username'";
                   $result_image=mysqli_query($con,$user_image);
                   $row_image=mysqli_fetch_array($result_image);
                   $user_image=$row_image['user_image'];
                   echo "
                   <li class='nav-item'>
                    <img src='./user_images/$user_image' alt='image' class='profile_img my-4'>
                    </li>
                   ";
                ?>

                <li class="nav-item ">
                <a class="nav-link text-light" href="profile.php">Pending Orders</a>
                </li>

                <li class="nav-item ">
                <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
                </li>

                <li class="nav-item ">
                <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
                </li>
                
                <li class="nav-item ">
                <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
                </li>
                
                <li class="nav-item ">
                <a class="nav-link text-light" href="logout.php">Log out</a>
                </li>
            </ul>
            </div>
            </div>
            <div class="col-md-10">
                <?php get_user_order_details(); 
                      if(isset($_GET['edit_account'])){
                        include('edit_account.php');
                      }
                      if(isset($_GET['my_orders'])){
                        include('user_orders.php');
                      }

                      if(isset($_GET['delete_account'])){
                        include('delete_account.php');
                      }
                ?>
            </div>
    </div>


    <!--last child-->
    <!--include footer-->
    <?php
       include('../includes/footer.php');
    ?>
    </div>
    


    <!--Bootsrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>