<?php
    session_start();
    if(!isset($_SESSION['login_ok'])){
        header("Location:../signin.php" );
    }
?>

<?php include('partials/menu.php') ?>



<main class="m-5 p-2">

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-success">Danh sách nhân viên </h1>
                <a href="add-member.php"> Thêm cán bộ</a>
                <div class="directory-table ">
                    <table class="tbl table mt-5 ">
                        <tr>
                            <th>STT</th>
                            <th>Tên nhân viên</th>
                            <th>Mã nhân viên </th>
                            <th>Chức vụ</th>
                            <th>Máy bàn</th>
                            <th>Email</th>
                            <th>Só di động</th>
                            <th>Hành động</th>
                        </tr>


                        <?php
                        // kêts nối sever
                        include('../config/constants.php');

                        //Query to Get all Admin
                        $sql = "SELECT * FROM db_nhanvien";
                        //Execute the Query
                        $result = mysqli_query($conn, $sql);

                        //CHeck whether the Query is Executed of Not
                        if ($result == TRUE) {
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($result); // Function to get all the rows in database
                            $sn = 1; //Create a Variable and Assign the value

                            //CHeck the num of rows
                            if ($count > 0) {
                                //WE HAve data in database
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                            
                                    $tenNv = $rows['tennv'];
                                    $maNv = $rows['manv'];
                                    $chucVu = $rows['chucvu'];
                                    $mayBan = $rows['mayban'];
                                    $email = $rows['email'];
                                    $diDong = $rows['sodidong'];

                                    //Display the Values in our Table
                        ?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo   $maNv; ?></td>
                                        <td><?php echo   $tenNv; ?></td>
                                        <td><?php echo  $chucVu; ?></td>
                                        <td><?php echo  $mayBan; ?></td>
                                        <td><?php echo  $email; ?></td>
                                        <td><?php echo  $diDong; ?></td>
                                        <td>
                                            <span class=" m-2 p-2 rounded" style="background-color :#7390fa" ;>
                                                <a href="$" class="text-light"><i class="fas fa-key"></i> đổi mật khẩu </a>
                                            </span>
                                            <span class=" m-2 p-2 rounded" style="background-color :#42d665" ;>
                                                <a href="$" class="text-dark"><i class="fas fa-user-edit"></i> Sửa </a>
                                            </span>
                                            <span class=" m-2 p-2 rounded" style="background-color :#f73b4e" ;>
                                                <a href="$" class="text-light"><i class="fas fa-trash"></i> Xoá </a>
                                            </span>
                                        </td>
                                    </tr>

                        <?php

                                }
                            } else {
                                //We Do not Have Data in Database
                            }
                        }

                        ?>

                    </table>

                </div>
            </div>
        </div>
    </div>
</main>


<?php include("../footer.php") ?>