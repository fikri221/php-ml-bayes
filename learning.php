<?php
require_once './vendor/autoload.php';
//use Phpml\Classification\Naive;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
use Phpml\SupportVectorMachine\Kernel;

?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">Learning Process</h1>
      <p class="lead">&nbsp;</p>
      <form action="" method="post" enctype="multipart/form-data">
        <fieldset style="background-color: #dedede">
          <legend>Training</legend>
          <p>Dataset<br />
            <input type="file" name="file" />
          </p>
          <p>Algorithm:
            <input type="radio" name="algo" value="bayes" checked="checked" /> Naive Bayes
            <input type="radio" name="algo" value="knn" /> kNN
            <!--<input type="radio" name="algo" value="svm" /> SVM-->
          </p>
        </fieldset>

        <fieldset style="background-color: #dedede">
          <legend>Testing Data</legend>
          <p>
            Usia :
            <select name="parameter[]">
              <option selected="selected">muda</option>
              <option>tua</option>
            </select>
          </p>
          <p>
            Berat Badan :
            <select name="parameter[]">
              <option selected="selected">kurus</option>
              <option>normal</option>
              <option>gemuk</option>
              <option>obesitas</option>
            </select>
          </p>
          <p>
            Jenis Kelamin :
            <select name="parameter[]">
              <option selected="selected">pria</option>
              <option>wanita</option>
            </select>
          </p>
          <p>
            Kondisi Ginjal :
            <select name="parameter[]">
              <option selected="selected">normal</option>
              <option>tidak</option>
            </select>
          </p>
          <p>
            Kondisi Paru-paru :
            <select name="parameter[]">
              <option selected="selected">normal</option>
              <option>tidak</option>
            </select>
          </p>
          <p>
            Gula Darah :
            <select name="parameter[]">
              <option selected="selected">rendah</option>
              <option>normal</option>
              <option>menengah</option>
              <option>diabetes</option>
            </select>
          </p>
          <p>
            Tekanan Darah :
            <select name="parameter[]">
              <option selected="selected">normal</option>
              <option>tidak</option>
            </select>
          </p>
          <p>
            Kesehatan Jantung :
            <select name="parameter[]">
              <option selected="selected">normal</option>
              <option>tidak</option>
            </select>
          </p>
          <p>
            Tingkat Depresi :
            <select name="parameter[]">
              <option selected="selected">berat</option>
              <option>ringan</option>
            </select>
          </p>
          <p>
            Asam Urat :
            <select name="parameter[]">
              <option selected="selected">rendah</option>
              <option>normal</option>
              <option>tinggi</option>
            </select>
          </p>
          <p>
            Seksualitas :
            <select name="parameter[]">
              <option selected="selected">normal</option>
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
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {
          $dataset = $_FILES['file']['tmp_name'];
          if (($handle = fopen($dataset, "r")) !== FALSE) {
            $row = 1;
            /*
      data ada 11 parameter dan 5 label
      label = DIURETIK,BETA BLOCKER,ACE INHIBITOR,CCB,ABR
      */
            $samples = array();
            $labels = array();
            $labelnames = array(
              'diuretik' => 'tidak',
              'beta_blocker' => 'tidak',
              'ace_inhibitor' => 'tidak',
              'ccb' => 'tidak',
              'abr' => 'tidak',
            );
            $label1 = array(); //diuretik
            while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
              $brs = array_chunk($data, 11);
              array_push($samples, $brs[0]);
              array_push($labels, $brs[1]);
              $label1[] = $brs[1][0];
              $label2[] = $brs[1][1];
              $label3[] = $brs[1][2];
              $label4[] = $brs[1][3];
              $label5[] = $brs[1][4];
            }
          }
        }
        //learning process
        $dtesting = array();
        foreach ($_POST['parameter'] as $value) {
          $dtesting[] = $value;
        }
        //$dtesting = array('tua','kurus','pria','normal','normal','rendah','normal','normal','ringan','rendah','normal');

        if ($algo == 'bayes') {

          $classifier = new NaiveBayes();
          //train every labels
          $classifier->train($samples, $label1); //diuretik
          $labelnames['diuretik'] = $classifier->predict($dtesting);

          $classifier->train($samples, $label2);
          $labelnames['beta_blocker'] = $classifier->predict($dtesting);

          $classifier->train($samples, $label3);
          $labelnames['ace_inhibitor'] = $classifier->predict($dtesting);

          $classifier->train($samples, $label4);
          $labelnames['ccb'] = $classifier->predict($dtesting);

          $classifier->train($samples, $label5);
          $labelnames['abr'] = $classifier->predict($dtesting);
        } else if ($algo == 'knn') {

          $classifier = new KNearestNeighbors();
          $classifier->train($samples, $label1);

          echo $classifier->predict($dtesting);
        } else if ($algo == 'svm') {

          $classifier = new SVC(Kernel::LINEAR, $cost = 1000);
          $classifier->train($samples, $label1);

          echo $classifier->predict($dtesting);
        }

        //tampilkan
        echo "<p class='lead'>The Results</p>";
        foreach ($labelnames as $key => $value) {
          # code...
          echo "$key = $value<br/>";
        }
      }
      ?>


      <p class="lead"><br /><br /></p>
      <p class="lead">Contributors:</p>
      <ul class="list-unstyled">
        <li>Hari Soetanto, S.Kom, M.Sc</li>
        <li>Prof. Sri Hartati</li>
        <li>Retyanto Wardoyo, Ph.D</li>
      </ul>
    </div>
  </div>
</div>