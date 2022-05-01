<?php 
session_start();
require_once('utils/gameModel.php');
require_once('utils/postModel.php');
require_once('utils/userModel.php');

$games = Game::all();
$gameCount = count($games);
$post = Post::all();
$indexBanner = 1;
?>

<!doctype html>
<html lang="en">
<?php require_once('utils/components/head.php') ?>

  <body class="bg-dark">

    <?php require_once('utils/components/navbar.php') ?>
    <div class="row justify-content-center">
        <div class="col-12 mt-5 carousel slide" id="carouselId" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                  <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                <?php for ($i=1; $i < $gameCount; $i++) { ?>
                  <li data-bs-target="#carouselId" data-bs-slide-to="<?= $i ?>"></li>
                <?php }?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php foreach ($games as $key => $value) { ?>
                  <div class="carousel-item text-center <?php if($indexBanner === 1){?> active <?php } ?>">
                    <img class="w-50" src="<?= $value['banner'] ?>" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h3><?= $value['nama'] ?></h3>
                        <p><?= $value['deskripsi'] ?></p>
                    </div>
                </div>
                <?php $indexBanner++ ?>
                <?php } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
        </div>

        <div class="col-10 mt-5" id="guides">
            <h1 class="text-light">All Guides</h1>

            <div class="row mt-5 justify-content-center">
              <?php foreach ($post as $key => $value) { ?>
                <div class="col-lg-4 d-flex align-items-stretch my-2">
                <div class="card p-3 bg-danger">
                  <img src="<?= Game::getById($value['game_id'])['banner'] ?>" class="card-img-top" alt="">
                  <div class="card-body d-flex flex-column mt-auto">
                    <h3 class="card-title"><?= $value['judul'] ?></h3>
                    <p class="card-text"><?= $value['deskripsi'] ?></p>
                    <a href="/post.php?id=<?= $value['id'] ?>" class="btn btn-dark text-danger d-block mt-auto">Baca</a>   
                  </div>
                  <div class="card-footer bg-danger">
                    By <strong><?= User::getById($value['author'])['username'] ?></strong>
                  </div>
                </div>
              </div>
              <?php } ?>              
            </div>

        </div>
    </div>
    

    <div class="p-5 bg-dark text-danger mt-5">
        <!-- <h1 class="display-3">Fluid jumbo heading</h1> -->
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>