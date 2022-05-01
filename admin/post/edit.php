<?php
session_start();
require_once('../../utils/common.php');
require_once('../../utils/postModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $post = Post::getById($id);
}
if (isset($_POST['id'])) {
    $post = $_POST;
    $newPost = [
        "id" => $post['id'],
        "judul" => $post['judul'],
        'deskripsi' => $post['deskripsi'],
        "konten" => $post['konten']
    ];
    Post::update($newPost);
    Common::redirect('/admin/post');
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
                <h3 class="text-dark">Edit Posts</h3>
                <form class="form" action="" method="POST">
                    <input type="text" name="id" value="<?= $post['id'] ?>" hidden>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input require name="judul" value="<?= $post['judul'] ?>" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                          <label for="" class="form-label">Deskripsi</label>
                          <textarea class="form-control" name="deskripsi" id="" rows="3"><?= $post['deskripsi'] ?></textarea>
                    </div>
                    <div class="mb-3">
                      <input id="x" type="hidden" value="<?= $post['konten'] ?>" name="konten">
                      <trix-editor input="x"></trix-editor>
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <a class="btn btn-danger" href="/admin/post">Back</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>
