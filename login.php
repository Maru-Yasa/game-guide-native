<?php 
session_start();
require_once('utils/userModel.php');
require_once('utils/common.php');
if(isset($_SESSION['isAuthenticated'])){
    if($_SESSION['isAuthenticated'] === true){
        Common::redirect('/admin');
    }
}
$msg = "";
if(isset($_POST['username'])){
    if(User::login($_POST['username'], $_POST['password'])){
        Common::redirect('/admin');
    }else{
        $msg = "    <script>
        Swal.fire({
        title: 'Error!',
        text: 'Username atau Password salah',
        icon: 'error',
        confirmButtonText: 'Ok'
        })
        </script>";
    }
}


?>

<!doctype html>
<html lang="en">
    <?php require_once('utils/components/head.php') ?>

  <body class="bg-dark">

  <?php require_once('utils/components/navbar.php') ?>
  <?= $msg ?>

    <div class="container">

        <div class="row justify-content-center mt-5">
            <div class="col-10 col-md-7 col-lg-3">
                <form method="POST" action="">
                    <h2 class="text-danger fs-1 fw-bold mb-3">Login</h2>
                    <div class="mb-3">
                      <label for="username" class="form-label text-danger fw-bold">Username</label>
                      <input type="text" class="form-control" name="username" id="username" aria-describedby="username" placeholder="">
                    </div>
                    <div class="mb-4">
                      <label for="password" class="form-label text-danger fw-bold">Password</label>
                      <input type="password" class="form-control" name="password" id="password" aria-describedby="password" placeholder="">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-danger">Login</button>
                        <a class="btn btn-outline-danger">cancel</a>
                    </div>
                </form>
            </div>
        </div>

    </div>

      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>