<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css">
    <script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
    <title>Danh bạ đại học thuỷ lợi</title>
  </head>
  <body>        
        <header class="p-3 bg-dark text-white">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                    <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    </a>
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 text-white"><i class="fas fa-home"></i></a></li>
                    <li><a href="#" class="nav-link px-2 text-white"> Giới thiệu</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Tuyển sinh</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Đào Tạo</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Thư Viện</a></li>
                    <li><a href="#" class="nav-link px-2 text-white">Sinh Viên</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                    <input type="search" class="form-control form-control-dark" placeholder="Tìm Kiếm..." aria-label="Search">
                    </form>

                    <div class="text-end">
                    <button type="button" class="btn btn-light me-2">Đăng xuất</button>
                    <button type="button" class="btn btn-warning">Đăng ký</button>
                </div>
                </div>
            </div>
        </header>
        <footer>
            <div class="container ">
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
                        <div class="text-center p-3">
                            <form class="input-group" action="">
                                <input class="" placeholder="Tìm Kiếm Tên, Đơn Vị, ..."> 
                                <button method="" type="button"  class=" btn btn-success">Tìm</button>
                            </form>
                        </div>
                        <div class="directory-table">
                            <table id="tbl_exporttable_to_xls" class="table table-bordered text-center table-success table-stripedr border-primary">
                                <thead>
                                    <tr >    
                                        <th scope="col ">STT</th>
                                        <th scope="col">Họ và tên</th>
                                        <th scope="col">Chức vụ</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Số di động</th>
                                        <th scope="col">Tên đơn vị</th>
                                        <th scope="col">Sửa</th>
                                        <th scope="col">Xoá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--Đây là vùng dữ liệu thay đổi-->
                                    <?php
                                        $conn=mysqli_connect('localhost','root','','danhba_tlu','3306');
                                        if(!$conn){
                                            die('Kết Nối Thất Bại !');
                                        }
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
                                                    <td><a href="suaNhanVien.php?manv=<?php echo $row['manv']; ?>"><i class="far fa-edit"></i></a></td>
                                                    <td><a href="xoaNhanVien.php?manv=<?php echo $row['manv']; ?>"><i class="far fa-trash-alt"></i></a></td>
                                                </tr>
                                    <?php 
                                               
                                             $i++;
                                                
                                            }
                                        }

                                    ?>
                                    
                                </tbody>
                            </table>
                            <button class=" btn btn-success" onclick="ExportToExcel('xlsx')">Export excel</button>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="./javascript/tree.js"></script>
    
  </body>
</html>
