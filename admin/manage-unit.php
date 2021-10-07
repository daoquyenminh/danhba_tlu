<?php
    session_start();
    if(!isset($_SESSION['login_ok'])){
        header("Location:../signin.php" );
    }
?>

<?php include('partials/menu.php') ?>
<main class='m-5 p-3'>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-success">Danh sách Đơn vị</h1>
                <div class="directory-table ">
                    <table class="tbl table mt-5 ">
                        <tr>
                            <th>STT</th>
                            <th>Tên Đơn vị</th>
                            <th>Mã đơn vị</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Di động</th>
                            <th>Hành động</th>
                        </tr>


                        <?php
                            // kêts nối sever
                            include('../config/constants.php');

                            //Query to Get all Admin
                            $sql = "SELECT * FROM db_donvi";
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

                                        $tendv  = $rows['tendv'];
                                        $madv   = $rows['madv'];
                                        $diachi = $rows['diachi'];
                                        $email  = $rows['email'];
                                        $website=$rows['website'];
                                        $dienthoai=$rows['dienthoai']

                                        //Display the Values in our Table
                            ?>

                                        <tr>
                                            <td><?php echo $sn++; ?>. </td>
                                            <td><?php echo  $tendv; ?></td>
                                            <td><?php echo  $madv; ?></td>
                                            <td><?php echo  $diachi; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo  $website; ?></td>
                                            <td><?php echo $dienthoai; ?></td>
                                            <td>
                                                <span class=" m-2 p-2 rounded" style="background-color :#7390fa";>
                                                    <a href="$" class="text-light"><i class="fas fa-key"></i> đổi mật khẩu  </a>
                                                </span>
                                                <span class=" m-2 p-2 rounded" style="background-color :#42d665";>
                                                    <a href="$" class="text-dark"><i class="fas fa-user-edit"></i> Sửa  </a>
                                                </span>
                                                <span class=" m-2 p-2 rounded" style="background-color :#f73b4e";>
                                                    <a href="$" class="text-light"><i class="fas fa-trash"></i>  Xoá </a>
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

<?php include('../footer.php') ?>