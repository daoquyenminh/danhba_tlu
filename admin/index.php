<?php
    session_start();
    if(!isset($_SESSION['login_ok'])){
        header("Location:../signin.php" );
    }
?>


<?php include("partials/menu.php") ?>
        <main class="mt-3">
            <div class="container">
                chào mừng đén với trang chủ admin
            </div>
        </main>
<?php include("../footer.php") ?>