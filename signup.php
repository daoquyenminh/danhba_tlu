<?php include('header2.php') ?>
    <section class="p-5" style="background-color: #eee;">
        <div class="container ">
            <div class="row d-flex justify-content-center align-items-center ">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng ký</p>
                                    <?php
                                    if (isset($_GET['response'])) {
                                        if ($_GET['response'] == 'successfully') {
                                            echo "<p class'text-success text-center'> Vui lòng kiểm tra email để xác nhận !</p>";
                                        }
                                        if ($_GET['response'] == 'existed') {
                                            echo "<p class'text-danger text-center'> Đã tồn tại email này !</p>";
                                        }
                                    }
                                    ?>
                                    <form class="mx-1 mx-md-4 " method="post" action="process_signup.php">
                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Họ và tên đệm" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="lasttName" name="lastName" class="form-control" placeholder="Tên" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" />
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="pass1" name="pass1" class="form-control" placeholder="Mật khẩu" />

                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="password" id="pass2" name="pass2" class="form-control" placeholder="Nhập lại mật khẩu" />

                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <button type="submit" class="btn btn-success btn-lg" style=>Đăng ký</button>
                                        </div>
                                        <p class="text-center text-muted mt-5 mb-0">Bạn đã có tài khoản? <a href="signin.php" class="fw-bold text-danger"><u>Đăng nhập</u></a></p>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                                    <img src="https://cdn.dribbble.com/users/33385/screenshots/5724657/media/db98b0118283388a2aa4cd46d455aff7.png?compress=1&resize=1600x1200" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include('footer.php'); ?>
