<?php
session_start();
if (!isset($_SESSION['login_ok'])) {
    header("Location:../signin.php");
}

//kieesm tra đăng nhâph hay chưa
?>


<?php include('partials/menu.php') ?>
<main class='m-5 p-3'>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="text-success">Danh sách thành viên quản trị</h1>

                <?php
                    if (isset($_GET['response'])) {
                        if ($_GET['response'] == 'successfully') {
                            echo "<p class'text-success text-center'> Đăng ký thành công !</p>";
                        }
                        if ($_GET['response'] == 'existed') {
                            echo "<p class'text-danger text-center'> Đã tồn tại email này !</p>";
                        }
                    }
                ?>
                <div class="directory-table ">
                    <table class="tbl table mt-5 ">
                        <tr>
                            <th>STT</th>
                            <th>Tên </th>
                            <th>Họ</th>
                            <th>Email đăng nhập</th>
                            <th>Ngày đăng ký</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>


                        <?php
                        // kêts nối sever
                        include('../config/constants.php');

                        //Query to Get all Admin
                        $sql = "SELECT * FROM users";
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
                                    $id = $rows['userid'];
                                    $firstName = $rows['first_name'];
                                    $firstName = $rows['last_name'];
                                    $email = $rows['email'];
                                    $registration = $rows['registration_date'];
                                    $status1 = $rows['status'];

                                    //Display the Values in our Table
                        ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo  $firstName; ?></td>
                                        <td><?php echo  $firstName; ?></td>
                                        <td><?php echo  $email; ?></td>
                                        <td><?php echo $registration; ?></td>
                                        <td><?php echo $status1; ?></td>
                                        <td>
                                            <span class=" m-2 p-2 rounded" style="background-color :#7390fa" ;>
                                                <a href="#" class="text-light"><i class="fas fa-key"></i> đổi mật khẩu </a>
                                            </span>
                                            <span class=" m-2 p-2 rounded" style="background-color :#42d665" ;>
                                                <a href="editAdmin.php" class="text-dark"><i class="fas fa-user-edit"></i> Sửa </a>
                                            </span>
                                            <span class=" m-2 p-2 rounded" style="background-color :#f73b4e" ;>
                                                <a href="#" class="text-light"><i class="fas fa-trash"></i> Xoá </a>
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