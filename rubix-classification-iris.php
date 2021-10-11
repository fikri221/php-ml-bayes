<?php
require_once './vendor/autoload.php';
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Classifiers\KNearestNeighbors;
use Rubix\ML\Transformers\NumericStringConverter;
use Rubix\ML\CrossValidation\Metrics\Accuracy;
use Rubix\ML\CrossValidation\KFold;

$dataset = Labeled::fromIterator(new CSV('datasets/dataset-iris.csv', true, ',')); //(file, header, delimiter)
$dataset->apply(new NumericStringConverter());

#statistik deskriptif dataset
//$stats = $dataset->describe();
//echo "<pre>"; print_r($stats); echo "</pre>";

[$training, $testing] = $dataset->stratifiedSplit(0.8);

$estimator = new KNearestNeighbors(3);

$estimator->train($training);

$predictions = $estimator->predict($testing);

// akurasi
$metric = new Accuracy();
$score = $metric->score($predictions, $testing->labels());
echo "<br/>Akurasi = ".$score;

// k-fold validation
$validator = new KFold(10);
$score = $validator->test($estimator, $dataset, new Accuracy());
echo "<br/>Akurasi = ". $score;

//echo "<pre>"; print_r($predictions); echo "</pre>";
//echo "<pre>"; print_r($testing->labels()); echo "</pre>";