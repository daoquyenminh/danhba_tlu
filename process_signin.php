<?php
    session_start();
    $email      = $_POST['email'];
    $pass       = $_POST['pass'];
  
    // QUY TRÌNH 4 (3) bước
    // Bước 01:
    include('config/constants.php');

    // Bước 02: Thực hiện các truy vấn
    // 2.1 - Kiểm tra Email này đã tồn tại chưa?
    $sql_1 = "SELECT * FROM users WHERE email='$email'";
    $result_1 = mysqli_query($conn,$sql_1);

    if(mysqli_num_rows($result_1) > 0){
        $row=mysqli_fetch_assoc($result_1);
        $pass_saved = $row['password'];
        $status=$row['status'];

        if(password_verify($pass,$pass_saved )and $status==1){
            // Nếu khớp nhau > Tức là Đăng nhập thành công > Chuyển vào trang QUẢN TRỊ
            $_SESSION['login_ok']= $email;
            header("Location:admin/index.php");
        }else{
            $response = 'failed_password';
            header("Location:signin.php?response=$response");
        } 
        // echo '<pre>';
        // echo print_r($row);
        // echo '</pre>';
    }else{
        $response = 'failed_email';
        header("Location:signin.php?response=$response");
    }
    

?>