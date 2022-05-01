<?php
session_start();
require_once('../../utils/common.php');
require_once('../../utils/userModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_POST['username'])) {
    $post = $_POST;
    $newUser = [
        "username" => $post['username'],
        "password" => $post['password'], 
        "role" => $post['role'], 
    ];    
    User::create($newUser);
    Common::redirect('/admin/user');
}

?>

 <!DOCTYPE html>
 <html lang="en">
    <?php require_once('../../utils/components/head.php'); ?>
 <body>
    <?php require_once('../../utils/components/navbar.php'); ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 shadow p-3">
                <h3 class="text-dark">Add Posts</h3>
                <form class="form" action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Username</label>
                        <input require name="username" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input require class="form-control" type="password" name="password" id="">
                    </div>
                    <div class="mb-3">
                      <label for="role" class="form-label">Role</label>
                      <select class="form-control" name="role" id="role">
                        <option selected value="admin">Admin</option>
                        <option value="owner">Owner</option>
                      </select>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <a class="btn btn-danger" href="/admin/user">Back</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>
