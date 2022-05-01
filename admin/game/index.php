<?php
session_start();
require_once('../../utils/common.php');
require_once('../../utils/gameModel.php');
if(isset($_SESSION['isAuthenticated'])){
    if($_SESSION['isAuthenticated'] === true){

        $games = Game::all();
        $index = 1;
    }
}else{
    Common::redirect('/login.php');
}
?>

<!doctype html>
<html lang="en">
    <?php require_once('../../utils/components/head.php') ?>

  <body class="bg-light">

    <div class="">

        <div class="row">
            <?php require_once('../../utils/components/sidebar.php')?>
            <div class="col-sm p-3 min-vh-100 row justify-content-center">
                <div class="col-11 mt-5">
                    <h1 class="text-danger">Games Table</h1>
                    <a class="btn btn-danger btn-sm" href="/admin/game/add.php"><i class="bi bi-plus"></i> Create</a>
                    <table id="postTable" class="table table-stripped">
                        <thead class="bg-danger text-white">
                            <tr>
                                <td>No</td>
                                <td>Nama</td>
                                <td>Banner</td>
                                <td>Deskripsi</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($games as $key => $value) { ?>

                                    <tr>
                                        <td><?= $index ?></td>
                                        <td><?= $value['nama'] ?></td>
                                        <td><img src="<?= $value['banner'] ?>" width="150" alt=""></td>
                                        <td><?= $value['deskripsi'] ?></td>
                                        <td>
                                            <a href="/admin/game/delete.php?id=<?= $value['id'] ?>" class="btn btn-sm btn-danger"> <i class="bi bi-trash-fill"></i></a>
                                            <a href="/admin/game/edit.php?id=<?= $value['id']?>" class="btn btn-sm btn-dark"> <i class="bi bi-pencil-fill"></i></a>
                                        </td>
                                    </tr>

                                    <?php $index++ ?>
                                <?php } ?>
                        </tbody>
                        <script>
                                $(document).ready(function() {
                                    $('#postTable').DataTable();
                                } );
                        </script>
                    </table>
                </div>
            </div>
        </div>

    </div>


    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
