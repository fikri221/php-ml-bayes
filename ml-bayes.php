<?php
require_once './vendor/autoload.php';
include_once("config.php");
include("layouts/header.php");

use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;
use Phpml\Dataset\Demo\IrisDataset;

?>

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

      <?php
      if (!isset($_SESSION['name'])) {
        echo '<a href="auth/login.php" class="appointment-btn scrollto"><span>Login</span></a>';
      } else {
        echo '<a href="" class="appointment-btn scrollto"><span>' . $_SESSION['name'] . '</span></a>';
      }
      ?>

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
          <div class="row">
            <div class="col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="usia_anak" id="usia_anak" placeholder="Usia Anak Terakhir" step="any" required>
            </div>
            <div class="col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="tekanan_darah" id="tekanan_darah" placeholder="Tekanan Darah" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 form-group mt-3">
              <input type="number" class="form-control" name="bb" id="bb" placeholder="Berat Badan" required>
            </div>
            <div class="col-md-6 form-group mt-3">
              <input type="text" class="form-control" name="metode" id="metode" placeholder="Metode Terakhir" required>
            </div>
          </div>
          <div class="text-center mt-5">
            <input type="submit" name="proses" class="btn btn-primary" value="Process..." />
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

          $dataset = new CsvDataset(dirname(__FILE__) . '/datasets/Data_Akseptor3.csv', 6, true);

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
          echo "<p class='mt-3'>Silahkan hitung terlebih dahulu</p>";
        } else {
          echo "<h3 class='mt-5'>Hasil Proses : <strong>$class_hasil</strong></h3>";
          // echo "<img src='img/$class_hasil.png' width='150' />";
        } ?>

      </div>
    </div>
  </div>

  <!-- Javascript files -->
  <?php include("layouts/scripts.php") ?>

</body>

</html>