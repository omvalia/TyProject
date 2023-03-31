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
    <title>Ecommerce Website Checkout Page</title>
    <!--Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS Link-->
    <link rel="stylesheet" href="../style.css?version=1">
    <style>
.container {
    padding: 20px;
}

h2 {
     color: #088178;
     font-size: 32px;
     margin-bottom: 20px;
     text-align:center;
     margin-top:
}

.your_order, .delivery_details, .payment_options {
  background-color: #fff;
  padding: 20px;
  margin-bottom: 20px;
}

.your_order h3, .delivery_details h3, .payment_options h3 {
  color: #088178;
  font-size: 24px;
  margin-bottom: 20px;
}

.your_order p {
  color: #000;
  font-size: 18px;
  margin-bottom: 20px;
}

.your_order img {
  max-width: 100%;
  margin-bottom: 20px;
}

.delivery_details label, .delivery_details input[type="text"], .payment_options label, .payment_options input[type="radio"] {
  display: block;
  margin-bottom: 10px;
}

.delivery_details input[type="text"], .payment_options input[type="radio"] {
  width: 100%;
  padding: 10px;
  border: none;
  border-radius: 4px;
  background-color: #f5f5f5;
}

.payment_options input[type="radio"] {
  margin-right: 10px;
}

.payment_options label {
  color: #000;
  font-size: 18px;
  margin-bottom: 10px;
}
    </style>
</head>
<body>
<section id="header">
        <a href="index.php"><img src="../images/logo3.png" alt="logo" class="logo" ></a>
        <div>   
            <ul id="navbar">
                <li><a href="../index.php" class="active">Home</a></li>
                <li><a href="../display_all.php">Shop</a></li>
                <li>
                <?php
                if(!isset($_SESSION['username'])){
                    echo "<a href='user_login.php' id='navbar'>Login</a>";
                }
                else{
                    echo"<li><a href='logout.php' id='navbar'>Logout</a></li>";
                    echo "<li><a href='profile.php' id='navbar'>Account</a></li>";
                }
                ?>
                </li>
                <li><a href="../cart.php"><i class="fa-solid fa-cart-shopping"><sup><?php cart_item()?></sup></i></a></li>
            </ul>
        </div>
    </section>
     
    
    <!-- fourth child-->
    
    <div class="row px-1">
        <!--products-->
        <div class="col-md-12">
            <div class="row">
                <?php
                    if(!isset($_SESSION['username'])){
                        include('user_login.php');
                    }else{
                        include('payment.php');
                    }
                ?>
            </div>  
            <!--column end-->
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