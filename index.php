<?php include"header.php" ?>
        <main class="m-5">
            <div class="container">
                <h1 class="h2 text-center text-dark p-3">Danh bạ Đại học  Thuỷ Lợi</h1>
                <div class="row">
                    <div class="col-md-3 bg-success p-4 text-light">
                        <div class="outer">
                            <ul id="ul">
                                <li><span class="caret">Khoa công nghệ thông tin</span>
                                    <ul class="nested">
                                        <li>Đơn vị 1</li>
                                        <li>Đơn vị 2</li>
                                        <li>Đơn vị 3</li>
                                    </ul>
                                </li>
                                <li><span class="caret">Khoa công nghệ thôngg tin</span>
                                    <ul class="nested">
                                        <li>Đơn vị 1</li>
                                        <li>Đơn vị 2</li>
                                        <li>Đơn vị 3</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <p class="h3 p-2 text-center text-danger">Thông tin giảng viên</p>
                        <div class="text-center  p-3">
                            <form class="input-group " action="">
                                <input class="" placeholder="Tìm Kiếm Tên, Đơn Vị, ..."> 
                                <button method="" type="button"  class=" btn btn-success">Tìm</button>
                            </form>
                        </div>
                        <div class="directory-table">
                            <table id="tbl_exporttable_to_xls" class="table table-bordered text-center  table-stripedr border-primary">
                                <thead>
                                    <tr >    
                                        <th scope="col ">STT</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Chức vụ</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số di động</th>
                                        <th scope="col">Tên đơn vị</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Đây là vùng dữ liệu thay đổi-->
                                    <?php
                                        include("config/constants.php");
                                        $sql="SELECT nv.manv, nv.tennv, nv.chucvu, nv.email,nv.sodidong, dv.tendv From db_nhanvien nv, db_donvi dv where nv.madv=dv.madv";
                                        $result=(mysqli_query($conn,$sql));
                                        // Bước 3 trả về két quả 
                                        if(mysqli_num_rows($result)>0){
                                            $i=1;
                                            
                                            while($row=mysqli_fetch_assoc($result)){
                                    ?>          
                                                <tr>
                                                    <th scope="row"><?php echo $i; ?></th>
                                                    <td><?php echo $row['tennv'];  ?></td>
                                                    <td><?php echo $row['chucvu'];   ?></td>
                                                    <td><?php echo $row['email'];  ?></td>
                                                    <td><?php echo $row['sodidong'];   ?></td>
                                                    <td><?php echo $row['tendv'];  ?></td>
                                                </tr>
                                    <?php 
                                               
                                             $i++;
                                                
                                            }
                                        }

                                    ?>
                                    
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>     
<?php include"footer.php" ?>
