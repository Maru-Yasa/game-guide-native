<?php
session_start();
require_once('../../utils/common.php');
require_once('../../utils/postModel.php');
require_once('../../utils/gameModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_POST['judul'])) {
    $post = $_POST;
    $newPost = [
        "judul" => $post['judul'],
        'deskripsi' => $post['deskripsi'],
        "konten" => $post['konten'],
        "game_id" => $post['game_id'],
        "author" => $_SESSION['user']['id']
    ];
    Post::create($newPost);
    Common::redirect('/admin/post');
}
$games = Game::all();

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
                <form class="form" action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Judul</label>
                        <input require name="judul" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                          <label for="" class="form-label">Deskripsi</label>
                          <textarea required class="form-control" name="deskripsi" id="" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Games</label>
                      <select class="form-control" name="game_id" id="">
                        <?php foreach ($games as $key => $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="mb-3">
                      <input id="x" required type="hidden" name="konten">
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
