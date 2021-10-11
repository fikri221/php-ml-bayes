<?php
require_once './vendor/autoload.php';
use Phpml\Classification\KNearestNeighbors;
use Phpml\Dataset\ArrayDataset;
use Phpml\Dataset\CsvDataset;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ConfusionMatrix;
use Phpml\CrossValidation\StratifiedRandomSplit;
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">PHP-ML Demo (Classification) - Kelulusan Mahasiswa</h1>
      <p class="lead">&nbsp;</p>
      <form action="" method="post" enctype="multipart/form-data">
        <fieldset style="background-color: #dedede">
          <legend>Dataset</legend>
          <input type="radio" name="dataset" value="iris" checked="checked" />kelulusan-mahasiswa.csv 
          </p>
        </fieldset>
<!--
        <fieldset style="background-color: #dedede">
          <legend>Testing Data</legend>
          <p>
            Sepal Length : 
            <input type="number" step="any" name="parameter[]"/>
          </p>
          <p>
            Sepal Width : 
            <input type="number" step="any" name="parameter[]"/>
          </p>
          <p>
            Petal Length : 
            <input type="number" step="any" name="parameter[]"/>
          </p>
          <p>
            Petal Width : 
            <input type="number" step="any" name="parameter[]"/>
          </p>
        </fieldset>
-->
        <p class="lead"></p>
        <p class="lead">
          <input type="submit" name="proses" value="Process..."/>
        </p>

      </form>
      <?php

if(isset($_POST['proses'])) {
  $algo = 'knn';
  
  $dataset = new CsvDataset(dirname(__FILE__). '/datasets/kelulusan-mahasiswa.csv', 13, true); //(file, jml atribut, header?)
  //echo dirname(__FILE__). '/datasets/kelulusan-mahasiswa.csv';
  $row = 1;
  /*
  dataset ada 13 atribut dan 1 label kelas
  
  label = terlambat (2) / tepat (1)
  */

  $splits = new StratifiedRandomSplit($dataset, 0.2); //(dataset, %test data)

  // train group
  $train_samples = $splits->getTrainSamples();
  $train_labels = $splits->getTrainLabels();

  // test group
  $test_samples = $splits->getTestSamples();
  $test_labels = $splits->getTestLabels();

  //echo "<pre>"; print_r($train_samples); echo "</pre>";
  $i = 0; $j = 0;
  foreach ($train_samples as $row) {
    $j = 0;
    foreach ($row as $col) {
      $train_samples[$i][$j++] = floatval($col);
    } 
    $i++;
  }

  $i = 0; $j = 0;
  foreach ($test_samples as $row) {
    $j = 0;
    foreach ($row as $col) {
      $test_samples[$i][$j++] = floatval($col);
    } 
    $i++;
  }
    
  if($algo == 'knn') {

    $classifier = new KNearestNeighbors($k=5);
    //train every labels
    $classifier->train($train_samples, $train_labels); 
    $class_hasil = $classifier->predict($test_samples);
        
    echo "<h2 class='lead'>Algorithm Performance</h2>";
    $confusionMatrix = ConfusionMatrix::compute($test_labels, $class_hasil);
    echo "<h3>Confusion Matrix</h3>";
    ?>
    <table border="1">
      <tr>
        <td>&nbsp;</td>
        <td>TEPAT</td>
        <td>TERLAMBAT</td>
      </tr>
      <tr>
        <td>TEPAT</td>
        <td><?php echo $confusionMatrix[0][0]?></td>
        <td><?php echo $confusionMatrix[0][1]?></td>
      </tr>
      <tr>
        <td>TERLAMBAT</td>
        <td><?php echo $confusionMatrix[1][0]?></td>
        <td><?php echo $confusionMatrix[1][1]?></td>
      </tr>
    </table>
    <?php
    echo "<h3>Akurasi: ". Accuracy::score($test_labels, $class_hasil)."</h3>"; //(actual, predicted)
  } 
}
?>


      <p class="lead"><br/><br/></p>
      <p class="lead">Contributors:</p>
      <ul class="list-unstyled">
        <li>Dr. Achmad Solichin, S.Kom, M.T.I</li>
      </ul>
    </div>
  </div>
</div>

