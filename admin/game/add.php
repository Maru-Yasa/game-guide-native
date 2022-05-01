<?php
session_start();
require_once('../../utils/common.php');
require_once('../../utils/postModel.php');
require_once('../../utils/gameModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_POST['nama'])) {
    $post = $_POST;
    if (!isset($_FILES['img'])) {
        $newGame = [
            "nama" => $post['nama'],
            "deskripsi" => $post['deskripsi'], 
            "banner" => null,
        ];    
        Game::create($newGame);
        Common::redirect('/admin/game');
    }
    $image=$_FILES['img']['name']; 
    $imageArr=explode('.',$image); //first index is file name and second index file type
    $rand=rand(10000,99999);
    $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
    $uploadPath="../../public/img/".$newImageName;
    $isUploaded=move_uploaded_file($_FILES["img"]["tmp_name"],$uploadPath);
    $newGame = [
        "nama" => $post['nama'],
        "deskripsi" => $post['deskripsi'], 
        "banner" => "/public/img/$newImageName",
    ];  
    Game::create($newGame);
    Common::redirect('/admin/game');
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
                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                        <input require name="nama" type="text" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="mb-3">
                          <label for="" class="form-label">Deskripsi</label>
                          <textarea required class="form-control" name="deskripsi" id="" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label"></label>
                      <input type="file" class="form-control" name="img" id="" placeholder="" aria-describedby="fileHelpId">
                    </div>
                    <button type="submit" class="btn btn-dark">Submit</button>
                    <a class="btn btn-danger" href="/admin/post">Back</a>
                </form>
            </div>
        </div>
    </div>

 </body>
 </html>
