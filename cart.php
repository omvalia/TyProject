<?php
/*connect file*/
include('includes/connect.php');
include('functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <!--Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS Link-->
    <link rel="stylesheet" href="style.css">
    <style>
    .cart_image{
        width:80px;
        height:80px;
        object-fit:contain;
    }
    </style>
</head>
<body>
    <?php
       include('./includes/navbar.php');
    ?>

    <!-- fourth child-->
    <div class="container">
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">
              
                    <!--php code to display dynamic data-->
                    <?php 
                     global $con;
                     $get_ip_address = getIPAddress();  //::1
                     $total_price=0;
                     $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                     $result=mysqli_query($con,$cart_query);
                     $result_count=mysqli_num_rows($result);
                     if($result_count>0){
                        echo"
                        <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Product Image</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                            <th>Remove</th>
                            <th colspan='2'>Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
                     while($row=mysqli_fetch_array($result)){
                         $product_id=$row['product_id'];
                         $select_products="Select * from `products` where product_id='$product_id'";
                         $result_products=mysqli_query($con,$select_products);
                         while($row_product_price=mysqli_fetch_array($result_products)){
                             $product_price=array($row_product_price['product_price']);
                             $price_table=$row_product_price['product_price'];
                             $product_title=$row_product_price['product_title'];
                             $product_image1=$row_product_price['product_image1'];
                             $product_value=array_sum($product_price);
                             $total_price+=$product_value;
                    
                    ?>
                    <tr>
                        <td><?php echo $product_title?></td>
                        <td><img src="./admin_area/product_images/<?php echo $product_image1?>" alt="<?php echo $product_image1?>" class="cart_image"></td>
                        <td><input type="text" class="form-input w-50" name="qty"></td>
                        <?php 
                            $get_ip_address = getIPAddress();  //::1
                            if(isset($_POST['update_cart']))
                            {
                                $quantities=$_POST['qty'];
                                $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_address'";
                                $result_products_quantity=mysqli_query($con,$update_cart);
                                $total_price=$total_price*$quantities;
                            }
                        ?>
                        <td><?php echo $price_table ?>/-</td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <!--<button class="bg-info p-2 px-3 border-0 mx-3">
                            Update
                        </button>-->
                        <input type="submit" value="Update Cart" class="bg-info p-2 px-3 border-0 mx-3" name="update_cart">
                        <!--<button class="bg-info p-2 px-3 border-0 mx-3">Remove</button></td>-->
                        <input type="submit" value="Remove Cart" class="bg-info p-2 px-3 border-0 mx-3" name="remove_cart">
                    </tr>
                    <?php
                        }}}
                        else{
                            echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                        }
                        ?>
                </tbody>
            </table>
            <!--subttoal-->
            <div class="d-flex mb-5">
                <?php 
                    $get_ip_address = getIPAddress();  //::1
                    $cart_query="Select * from `cart_details` where ip_address='$get_ip_address'";
                    $result=mysqli_query($con,$cart_query);
                    $result_count=mysqli_num_rows($result);
                    if($result_count>0){
                        echo "
                        <h4 class='px-3'>Subtotal: <strong class='text-info'>$total_price/-</strong></h4>
                        <input type='submit' value='Conitnue Shopping' class='bg-info p-2 px-3 border-0 mx-3' name='continue_shopping'>
                        <button class='bg-secondary p-2 px-3 border-0 text-light'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                    }
                    else{
                        echo "<input type='submit' value='Conitnue Shopping' class='bg-info p-2 px-3 border-0 mx-3' name='continue_shopping'>";
                    }
                    if(isset($_POST['continue_shopping'])){
                        echo "<script>window.open('index.php','_self')</script>";
                    }
                ?>
            </div>
        </div>
    </div>
    </form>
    <!--fuction to remove items-->
    <?php
        function remove_cart_item(){
            global $con;
            if(isset($_POST['remove_cart'])) {
                foreach($_POST['removeitem'] as $remove_id)
                {
                    echo $remove_id;
                    $delete_query="delete from `cart_details` where product_id=$remove_id";
                    $run_delete=mysqli_query($con,$delete_query);
                    if($run_delete){
                        echo "<script>window.open('cart.php','_self')</script>";
                    }
                }
            }
        }
echo $remove_item=remove_cart_item();
?>
    <!--last child-->
    <!--include footer-->
    <?php
       include('./includes/footer.php');
    ?>
    </div>
    


    <!--Bootsrap JS Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>