<nav class="navbar navbar-expand-sm text-danger navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-danger fw-bold" href="#"> <i class="bi bi-controller" style="font-size: 30px;"></i></a>
            <button class="navbar-toggler  navbar-toggler-icon d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation"></button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0 text-danger">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="visually-hidden"></span></a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/#guides">Guides<span class="visually-hidden"></span></a>
                    </li>
                    <?php if(!isset($_SESSION['isAuthenticated'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/login.php">Admin Login</a>
                    </li>
                    <?php } ?>
                    <?php if(isset($_SESSION['isAuthenticated'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin">Admin</a>
                    </li>
                    <?php } ?>
                </ul>
                <ul class="navbar-nav ms-auto">
            <?php if(isset($_SESSION['isAuthenticated'])){ ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill"></i> <?= $_SESSION['user']['username'] ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/admin/user/edit.php?id=<?= $_SESSION['user']['id'] ?>"> <i class="bi bi-pencil"></i> Edit</a></li>
                  <li>
                    <form action="logout.php" method="get">
                      <button type="submit" class="btn dropdown-item" value="Logout"><i class="bi bi-box-arrow-right"></i> Logout</button>
                    </form>
                  </li>

                </ul>
              </li>
            <?php } ?>
      </ul>
            </div>
        </div>
    </nav>