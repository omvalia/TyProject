<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>
    <!--Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--Font Awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS Link-->
    <link rel="stylesheet" href="style.css">
    <style>
        body{
            width:100%;
        }
    </style>
</head>
<body>
    <!--php code to access user id-->
    <?php
        $user_ip=getIPAddress();
        $get_user="Select * from `user_table` where user_ip='$user_ip'";
        $result=mysqli_query($con,$get_user);
        $run_query=mysqli_fetch_array($result);
        $user_id=$run_query['user_id'];
    ?>



    <div class="container">
        <h2 class="text-center text-info">Payment Options</h2>
        <div class="row d-flex justify-content-center align-items-center mt-5">
            <div class="col-md-6">
            <a href="https://www.paypal.com" target="_blank"><h3 class="text-center m-5">Pay Online</h3></a>
            <div class="col-md-6">
            <a href="order.php?user_id=<?php echo $user_id?>" target="_blank"><h3 class="text-center m-5">Pay Offline</h3></a>
            </div>
        </div>
    </div>
</body>
</html>