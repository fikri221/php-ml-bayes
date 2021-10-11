<?php
require_once './vendor/autoload.php';
use Phpml\Regression\LeastSquares;
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">PHP-ML Demo (Linear Regression) - Covid-19 Indonesia</h1>
      <p class="lead">&nbsp;</p>
      
      <?php

  //$dataset = new CsvDataset(dirname(__FILE__). '/datasets/covid19-dki-20des2020.csv', 13, true); //(file, jml atribut, header?)
  
  #getdata
  /*
  covid19-indonesia-des2020.csv (hari-ke, confirmed)
  */
  $row = 1;
  $samples = $targets = $d = [];
  if (($handle = fopen(dirname(__FILE__). '/datasets/covid19-indonesia-des2020.csv', "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
        if($row==1) {
          $row = 2; continue;
        }
        array_push($samples, array($data[0], $data[1]) );
        array_push($targets, intval($data[2]));
        //array_push($d, $data); 
      }
      fclose($handle);
  }
  use Phpml\Dataset\ArrayDataset;

  $dataset = new ArrayDataset(
      $samples,
      $targets
  );
  $s = $dataset->getSamples();
  $t = $dataset->getTargets();
  //$samples = [[60], [61], [62], [63], [65]];
  //$targets = [3.1, 3.6, 3.8, 4, 4.1];
  //echo "<pre>"; print_r($s); echo "</pre>";
  $regression = new LeastSquares();
  $regression->train($s, $t);
  echo "<br/>Prediksi jumlah meninggal hari ke-32 (riil=22329) = ". $regression->predict([32,751270]);
  echo "<br/>Prediksi jumlah meninggal hari ke-50 (riil=50;927380;26590) = ". $regression->predict([50,927380]);
?>


      <p class="lead"><br/><br/></p>
      <p class="lead">Contributors:</p>
      <ul class="list-unstyled">
        <li>Dr. Achmad Solichin, S.Kom, M.T.I</li>
      </ul>
    </div>
  </div>
</div>

