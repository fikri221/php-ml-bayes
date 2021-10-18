<?php
require_once './vendor/autoload.php';
include_once("config.php");

use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;
use Phpml\Dataset\Demo\IrisDataset;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Contralab - Classification</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Medilab - v4.6.0
  * Template URL: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

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
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="#appointment" class="appointment-btn scrollto"><span>Login</span></a>

    </div>
  </header><!-- End Header -->

  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">PHP-ML Demo (Classification)</h1>
        <p class="lead">&nbsp;</p>
        <form action="" method="post" enctype="multipart/form-data" role="form">
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="number" name="usia" class="form-control" id="usia" placeholder="Usia" required>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="number" class="form-control" name="jml_anak" id="jml_anak" placeholder="Jumlah Anak" required>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="number" class="form-control" name="usia_anak" id="usia_anak" placeholder="Usia Anak Terakhir" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="tekanan_darah" id="tekanan_darah" placeholder="Tekanan Darah" required>
          </div>
          <div class="form-group mt-3">
            <input type="number" class="form-control" name="bb" id="bb" placeholder="Berat Badan" required>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="metode" id="metode" placeholder="Metode Terakhir" required>
          </div>
          <div class="text-center mt-3">
            <input type="submit" name="proses" value="Process..." />
          </div>
        </form>

        <!-- <form action="" method="post" enctype="multipart/form-data">
          <fieldset style="background-color: #dedede">
            <legend>Training</legend>
            <p>Dataset<br />
              <input type="radio" name="dataset" value="iris" checked="checked" />Iris Dataset
            </p>
            <p>Algorithm:
              <input type="radio" name="algo" value="bayes" checked="checked" /> Naive Bayes
              <input type="radio" name="algo" value="knn" /> kNN
              <input type="radio" name="algo" value="svc" /> SVC
            </p>
          </fieldset>

          <fieldset style="background-color: #dedede">
            <legend>Testing Data</legend>
            <p>
              Usia :
              <select name="usia">
                <option selected="selected">--Pilih--</option>
                <option>ya</option>
                <option>tidak</option>
              </select>
            </p>
            <p>
              Jumlah Anak :
              <select name="jml_anak">
                <option selected="selected">--Pilih--</option>
                <option>ya</option>
                <option>tidak</option>
              </select>
            </p>
            <p>
              Tekanan Darah :
              <select name="tekanan_darah">
                <option selected="selected">--Pilih--</option>
                <option>ya</option>
                <option>tidak</option>
              </select>
            </p>
            <p>
              Riwayat Penyakit :
              <select name="riwayat_penyakit">
                <option selected="selected">--Pilih--</option>
                <option>ya</option>
                <option>tidak</option>
              </select>
            </p>
          </fieldset>

          <p class="lead"></p>
          <p class="lead">
            <input type="submit" name="proses" value="Process..." />
          </p>

        </form> -->

        <?php
        if (isset($_POST['proses'])) {
          // $algo = $_POST['algo'];
          // $algo = 'bayes';

          $dataset = new IrisDataset();

          $row = 1;
          /*
        data ada 4 parameter dan 1 label
        sepal length,sepal width,petal length,petal width
        label = jenis alat kontrasepsi
        */
          $samples = $dataset->getSamples();
          $labels = $dataset->getTargets();

          //learning process
          // $dtesting = array();
          // foreach ($_POST['parameter'] as $value) {
          //   $dtesting[] = $value;
          // }
          $dtesting[] = $_POST['usia'];
          $dtesting[] = $_POST['jml_anak'];
          $dtesting[] = $_POST['usia_anak'];
          $dtesting[] = $_POST['tekanan_darah'];
          $dtesting[] = $_POST['bb'];
          $dtesting[] = $_POST['metode'];

          $class_hasil = "unknown";

          // Classification process with naive bayes
          $classifier = new NaiveBayes();
          //train every labels
          $classifier->train($samples, $labels);
          $class_hasil = $classifier->predict($dtesting);

          if ($class_hasil === "Suntik") {
            $class_hasil = "Suntik";
          } elseif ($class_hasil === "Implan") {
            $class_hasil = "Implan";
          } elseif ($class_hasil === "Pil") {
            $class_hasil = "Pil";
          } elseif ($class_hasil === "Kondom") {
            $class_hasil = "Kondom";
          } elseif ($class_hasil === "IUD") {
            $class_hasil = "IUD";
          }
        }
        ?>

        <?php if (empty($class_hasil)) {
          echo "Silahkan hitung terlebih dahulu";
        } else {
          echo "<h2 class='lead mt-5'>The Results : $class_hasil</h2>";
          // echo "<img src='img/$class_hasil.png' width='150' />";
        } ?>

      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>