<?php
require_once './vendor/autoload.php';
//use Phpml\Classification\Naive;
use Phpml\Classification\NaiveBayes;
use Phpml\Classification\KNearestNeighbors;
use Phpml\Classification\SVC;
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
          <p>Dataset<br/>
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

        <p class="lead"></p>
        <p class="lead">
          <input type="submit" name="proses" value="Process..."/>
        </p>

      </form>
      <?php

if(isset($_POST['proses'])) {
  $algo = $_POST['algo'];
  
  $dataset = new IrisDataset();

  $row = 1;
  /*
  data ada 4 parameter dan 1 label
  sepal length,sepal width,petal length,petal width
  label = jenis iris
  */
  $samples = $dataset->getSamples();
  $labels = $dataset->getTargets();
  //echo "<pre>"; print_r($samples); echo "</pre>";
  //echo "<pre>"; print_r($labels); echo "</pre>"; exit;
    
  //learning process
  $dtesting = array();
  foreach ($_POST['parameter'] as $value) {
    $dtesting[] = $value;
  }
  $class_hasil = "unknown";
  if($algo == 'bayes') {

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

  //tampilkan
  echo "<h2 class='lead'>The Results : $class_hasil</h2>";
  echo "<img src='img/$class_hasil.jpg' width='150'/>";
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

