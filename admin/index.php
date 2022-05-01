<?php 
session_start();
require_once('../utils/common.php');
if(isset($_SESSION['isAuthenticated'])){
    if($_SESSION['isAuthenticated'] === true){
    }
}else{
    Common::redirect('/login.php');
}
?>

<!doctype html>
<html lang="en">
    <?php require_once('../utils/components/head.php') ?>

  <body class="bg-light">

    <div class="">

        <div class="row">
            <?php require_once('../utils/components/sidebar.php')?>
            <div class="col-sm p-3 min-vh-100 row justify-content-center">
                <div class="col-10 text-center">
                    <i class="bi bi-person-circle text-danger" style="font-size: 100px;"></i>
                    <h1 class="text-danger">Hello <?= $_SESSION['user']['username'] ?></h1>
                    <a class="btn btn-outline-danger btn-sm" href="/admin/user/edit.php?id=<?= $_SESSION['user']['id'] ?>"><i class="bi bi-pencil"></i> Edit profile</a>
                </div>
            </div>
        </div>

    </div>

      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>