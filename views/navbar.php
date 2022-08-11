<nav class="navbar navbar-expand-lg bg-light shadow">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">

            <img src="../public/images/logo1.png" width="230px">

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="albums.php">My Albums</a>
                </li>


            </ul>
            <div class="d-flex">
                <span class="welcome-user"><?php echo 'Welcome' . " " . $_SESSION['username'] ?></span>

                <a href='../controllers/logout.php' class="btn btn-outline-dark home-logout">Log out</a>
            </div>
        </div>

    </div>
</nav>