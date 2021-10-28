<?php include("layouts/header.php") ?>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="index.php">Contralab</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="auth/register.php">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <?php
            if (!isset($_SESSION['name'])) {
                echo '<a href="auth/login.php" class="appointment-btn scrollto"><span>Login</span></a>';
            } else {
                echo '<a href="" class="appointment-btn scrollto"><span>' . $_SESSION['name'] . '</span></a>';
            }
            ?>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container">
            <h1>Welcome to Contralab</h1>
            <h2>Contralab adalah sebuah website yang dapat mengklasifikasikan<br>
                alat kontrasepsi yang cocok berdasarkan riwayat kesehatan Anda.</h2>
            <a href="ml-bayes.php" class="btn-get-started scrollto">Mulai Analisa</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Why Choose Contralab?</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                                Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
                            </p>
                            <div class="text-center">
                                <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-cube-alt"></i>
                                        <h4>Ullamco laboris ladore pan</h4>
                                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 d-flex align-items-stretch">
                                    <div class="icon-box mt-4 mt-xl-0">
                                        <i class="bx bx-images"></i>
                                        <h4>Labore consequatur</h4>
                                        <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title">
                    <h2>Alat Kontrasepsi</h2>
                    <p>Berikut beberapa alat kontrasepsi yang nantinya digunakan sebagai data label atau class.</p>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-syringe"></i></div>
                            <h4><a href="">Suntik</a></h4>
                            <p>Suntik KB adalah kontrasepsi hormonal yang mengandung hormon progestogen (progestin).
                                Hormon ini serupa dengan hormon alami wanita, yaitu progesteron, dan dapat menghentikan ovulasi.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-pills"></i></div>
                            <h4><a href="">Pil</a></h4>
                            <p>Pil KB adalah kelompok obat yang digunakan untuk mencegah kehamilan.
                                Ada dua jenis pil KB, yaitu pil KB kombinasi dan pil KB khusus progestin.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="fab fa-yandex-international"></i></div>
                            <h4><a href="">IUD</a></h4>
                            <p>IUD yang merupakan singkatan dari intrauterine device (alat kontrasepsi dalam rahim),
                                juga dikenal dengan sebutan kontrasepsi spiral. IUD bekerja dengan cara menghambat
                                gerakan sperma menuju saluran rahim untuk mencegah pembuahan, sehingga tidak terjadi kehamilan.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-download"></i></div>
                            <h4><a href="">Implan</a></h4>
                            <p>KB Implan merupakan salah satu alat kontrasepsi yang berbentuk seperti tabung plastik elastis dan berukuran kecil menyerupai
                                batang korek api yang dimasukkan ke jaringan lemak pada lengan atas wanita.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-space-shuttle"></i></div>
                            <h4><a href="">Kondom</a></h4>
                            <p>Kondom merupakan alat penghalang fisik yang menghentikan sperma
                                memasuki vagina dan mencapai sel telur. Penggunaan kondom secara konsisten dan benar dapat mengurangi
                                risiko penularan penyakit menular seksual seperti herpes genital dan sifilis.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-cut"></i></div>
                            <h4><a href="">Vasektomi</a></h4>
                            <p>Vasektomi adalah prosedur kontrasepsi pada pria yang dilakukan dengan cara memutus penyaluran sperma ke air mani.
                                Dengan demikian, air mani tidak akan mengandung sperma, sehingga kehamilan dapat dicegah.</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4">
                        <div class="icon-box">
                            <div class="icon"><i class="fas fa-ban"></i></div>
                            <h4><a href="">Tubektomi</a></h4>
                            <p>Tubektomi adalah prosedur pemotongan atau penutupan tuba falopi atau saluran indung telur yang menghubungkan
                                ovarium ke rahim. Setelah tubektomi, sel-sel telur tidak akan bisa memasuki rahim sehingga tidak dapat
                                dibuahi. Prosedur ini juga akan menghalangi sperma ke tuba falopi.</p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Contralab</h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
                        </p>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Javascript files -->
    <?php include("layouts/scripts.php") ?>

</body>

</html>