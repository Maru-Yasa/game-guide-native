<?php 
session_start();
require_once('./utils/postModel.php');
require_once('./utils/userModel.php');

if(!isset($_GET['id'])){}

$post = Post::getById($_GET['id']);

if(!$post){
    $post = "<center><h1>Post Not Found</h1></center>";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once('./utils/components/head.php') ?>
<body class="bg-dark">
    <?php require_once('./utils/components/navbar.php') ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 text-center my-5">
                <img class="" src="/public/img/pubgBanner.jpg" alt="">
            </div>
            <div class="col-10 text-white">
                <h1><?= $post['judul'] ?></h1>
                <i class="text-muted">by <?= User::getById($post['author'])['username'] ?></i>
                <p class="m-4 text-white">
                    <?= $post['konten'] ?>
                </p>
            </div>
        </div>
    </div>
</body>
</html>