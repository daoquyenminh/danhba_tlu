
<?php
    session_start();
    if(!isset($_SESSION['login_ok'])){
        header("Location:../signin.php" );
    }
?>
<?php include('partials/menu.php'); ?>
<main class="mt-3">
    <div class="container p-3">
        <div class="row">
            <div class="col-md-6">
                <h2 class="m-3">Thêm nhân viên a mới</h2>
                <?php
                if (isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
                {
                    echo $_SESSION['add']; //Display the SEssion Message if SEt
                    unset($_SESSION['add']); //Remove Session Message
                }
                ?>
                <form class=" m-5" action="process-add-member.php" method="POST">
                    <div class="row mb-3">
                        <label for="txtHoTen" class="col-sm-4 col-form-label">Tên nhân viên</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtHoTen" name="txtHoTen">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtChucVu" class="col-sm-4 col-form-label">Tên Chức Vụ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtChucVu" name="txtChucVu">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtSoMayBan" class="col-sm-4 col-form-label">Số máy bàn</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="txtSoMayBan" name="txtSoMayBan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtEmail" class="col-sm-4 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="txtMobile" class="col-sm-4 col-form-label">Số di động</label>
                        <div class="col-sm-8">
                            <input type="tel" class="form-control" id="txtMobile" name="txtMobile">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="" class="col-sm-4 col-form-label">Tên Đơn vị</label>
                        <div class="col-sm-8">
                            <select name="sltMaDV" id="sltMaDV">
                                <?php
                                    require('../config/constants.php');
                                    // Bước 2 : truy vấn dữ liệu
                                    $sql="SELECT * FROM db_donvi";
                                    $result=mysqli_query($conn,$sql);

                                    //Bước 3 : xử lý kết quả 
                                    if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_assoc($result)){
                                            echo '<option value="'.$row['madv'].'">'.$row['tendv'].'</option>';
                                        }
                                    }
                                    //đóng kết nối
                                    mysqli_close($conn);
                                ?>
                            </select>
                        </div>
                    </div>
                    <button typse="submit" class="btn btn-primary" name="btnSave">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include("../footer.php") ?>