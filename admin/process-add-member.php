<?php
        //Kiếm tra người dùng nhấn lưu vào form chuwa?
        if(isset($_POST['btnSave'])){
            $tenNv      = $_POST['txtHoTen'];
            $chucvu     = $_POST['txtChucVu'];
            $mayban     = $_POST['txtSoMayBan'];
            $email      = $_POST['txtEmail'];
            $soDiDong   = $_POST['txtMobile'];
            $maDv       = $_POST['sltMaDV'];

            //thực hiện quy trình
            require('../config/constants.php');

            //b2: truy vấn
            $sql="INSERT into db_nhanvien (tennv,chucvu,mayban,email,sodidong,madv)
            Value( '$tenNv', '$chucvu',  '$mayban','$email', '$soDiDong', '$maDv')";

            if(mysqli_query($conn,$sql)==TRUE){
                $value = 'successfully';
                header("Location:add-member.php?response=$value");
            }
            else{
                echo "chuwa thêm dc ";            }
                //đÓng kết nối
                mysqli_close($conn);
        }
        
?> 