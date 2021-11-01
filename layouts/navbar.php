<!-- ======= Header ======= -->
<header id="header" class="fixed">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.php">Contralab</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="auth/register.php">Data Pasien</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <?php if (!isset($_SESSION['name'])) : ?>
            <a href="auth/login.php" class="appointment-btn scrollto"><span>Login</span></a>
        <?php else : ?>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle appointment-btn scrollto" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?= $_SESSION['name'] ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <form action="auth/validation.php?action=logout" method="POST">
                        <button class="dropdown-item" value="logout">Logout</button>
                    </form>
                </div>
            </div>
        <?php endif ?>

    </div>
</header><!-- End Header -->