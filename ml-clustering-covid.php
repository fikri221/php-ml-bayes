<?php
require_once './vendor/autoload.php';
use Phpml\Clustering\KMeans;
?>

<!-- Page Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 text-center">
      <h1 class="mt-5">PHP-ML Demo (Clustering) - Covid-19 DKI Jakarta</h1>
      <p class="lead">&nbsp;</p>
      
      <?php

  //$dataset = new CsvDataset(dirname(__FILE__). '/datasets/covid19-dki-20des2020.csv', 13, true); //(file, jml atribut, header?)
  
  #getdata
  /*
  covid19-dki-20des2020.csv (kecamatan, POSITIF,Dirawat,Sembuh,Meninggal,Self Isolation)
  */
  $row = 1;
  $dataset = $dataset_label = array();
  if (($handle = fopen(dirname(__FILE__). '/datasets/covid19-dki-20des2020.csv', "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($row==1) {
          $row = 2; continue;
        }
        $kec = array_shift($data);
        $dataset_label[$kec] = $data;
        array_push($dataset, $data); 
      }
      fclose($handle);
  }
  echo "<pre>"; print_r($dataset_label); echo "</pre>";

  $kmeans = new KMeans(3);
  $clustered = $kmeans->cluster($dataset);
  echo "<pre>"; print_r($clustered); echo "</pre>";
?>


      <p class="lead"><br/><br/></p>
      <p class="lead">Contributors:</p>
      <ul class="list-unstyled">
        <li>Dr. Achmad Solichin, S.Kom, M.T.I</li>
      </ul>
    </div>
  </div>
</div>

