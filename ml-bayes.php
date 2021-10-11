<?php
require_once './vendor/autoload.php';
include_once("config.php");

use Phpml\Classification\NaiveBayes;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\Dataset\CsvDataset;
use Phpml\SupportVectorMachine\Kernel;
use Phpml\Dataset\Demo\IrisDataset;

?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">PHP-ML Demo (Classification)</h1>
      <p class="lead">&nbsp;</p>
      <form action="" method="post" enctype="multipart/form-data">
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

      </form>

      <?php
      if (isset($_POST['proses'])) {
        $algo = $_POST['algo'];

        $dataset = new IrisDataset();

        $row = 1;
        /*
        data ada 4 parameter dan 1 label
        sepal length,sepal width,petal length,petal width
        label = jenis alat kontrasepsi
        */
        $samples = $dataset->getSamples();
        $labels = $dataset->getTargets();
        //echo "<pre>"; print_r($samples); echo "</pre>";
        //echo "<pre>"; print_r($labels); echo "</pre>"; exit;

        //learning process
        $dtesting = array();
        // foreach ($_POST['parameter'] as $value) {
        //   $dtesting[] = $value;
        // }
        $dtesting[] = $_POST['usia'];
        $dtesting[] = $_POST['jml_anak'];
        $dtesting[] = $_POST['tekanan_darah'];
        $dtesting[] = $_POST['riwayat_penyakit'];

        $class_hasil = "unknown";

        if ($algo == 'bayes') {
          $classifier = new NaiveBayes();
          //train every labels
          $classifier->train($samples, $labels);
          $class_hasil = $classifier->predict($dtesting);
        } else if ($algo == 'knn') {
          $classifier = new KNearestNeighbors();
          $classifier->train($samples, $labels);
          $class_hasil = $classifier->predict($dtesting);
        } else if ($algo == 'svc') {
          $classifier = new SVC(Kernel::LINEAR, $cost = 1000);
          $classifier->train($samples, $labels);
          $class_hasil = $classifier->predict($dtesting);
        }
      }
      ?>

      <?php if (empty($class_hasil)) {
        echo "Silahkan hitung terlebih dahulu";
      } else {
        echo "<h2 class='lead'>The Results : <?= $class_hasil ?></h2>";
        echo "<img src='img/<?= $class_hasil ?>.png' width='150' />";
      } ?>
      
    </div>
  </div>
</div>