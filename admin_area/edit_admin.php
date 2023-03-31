<?php
if(isset($_GET['edit_admin'])){
    $user_session_name=$_SESSION['username'];
    $select_query="select * from `admin_table` where admin_name='$admin_session_name'";
    $result_query=mysqli_query($con,$select_query);
    $row_fetch=mysqli_fetch_assoc($result_query);
    $admin_id=$row_fetch['admin_id'];
    $admin_name=$row_fetch['admin_name'];
    $user_email=$row_fetch['user_email'];
    $user_mobile=$row_fetch['user_mobile'];
}
    if(isset($_POST['user_update'])){
        $update_id=$admin_id;
        $admin_name=$_POST['user_admin_name'];
        $admin_email=$_POST['admin_email'];
        $admin_password=$_POST['admin_password'];

        //update query
        $update_data="update `admin_table` set admin_name='$admin_name', admin_email='$admin_email', admin_password='$admin_password' where admin_id='$update_id'";
        $result_query_update=mysqli_query($con,$update_data);
        if($result_query_update){
            echo "<script>alert('Data updated successfully')</script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Admin</title>
</head>
<body>
    <div class="update_edit_account">
    <h3 class="text-center text-success mb-4">Edit Admin</h3>
    <form action="" method="post" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $admin_name ?>" name="admin_name >
        </div>

        <div class="form-outline mb-4">
            <input type="email" class="form-control w-50 m-auto" value="<?php echo $admin_email ?>" name="admin_email">
        </div>
    
        <div class="form-outline mb-4">
            <input type="text" class="form-control w-50 m-auto" value="<?php echo $admin_password ?>" name="admin_password">
        </div>
        <input type="submit" value="Update" class="" name="admin_update">
    </form>
    </div>
</body>
</html>