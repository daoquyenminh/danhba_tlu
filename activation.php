
<?php
    if(isset($_GET['code']) and isset($_GET['email'])){
        $code=$_GET['code'];
        $email=$_GET['email'];
        include('config/constants.php');
        $sql="SELECT * from users where email='$email'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $code_db=$row['code'];
        if($code==$code_db){
            $sql_update_staus="UPDATE users SET status =1 WHERE code ='$code';";
            mysqli_query($conn,$sql_update_staus);
            echo "XÁC nhận thành công";

        }
        else{
            echo 'that bai';
        }
    }
?>
