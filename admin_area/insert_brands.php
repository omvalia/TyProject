<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_t=$_POST['brand_title'];
    //select data from database
    $select_query="Select * from `brand` where brand_name='$brand_t'";
    $result_select=mysqli_query($con,$select_query);

    $numver=mysqli_num_rows($result_select);
    if($numver>0){
        echo "<script>alert('This Brand is present inside database')</script>";
    }else{
    $insert_query="insert into `brand` (brand_name) values('$brand_t')";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('Brand has been inserted successfully')</script>";
    }
}
}
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text update_brand" id="basic-addon1"><i class="fa-solid-fa-recipt"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="Categories" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2">
        
        <input type="submit" class="update_brand_btn border-0 p-2 my-3" name="insert_brand" value="Insert Brands" aria-label="Username">   
    </div>
</form>