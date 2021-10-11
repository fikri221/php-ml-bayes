<?php
require_once './vendor/autoload.php';
use Rubix\ML\Datasets\Labeled;
use Rubix\ML\Datasets\Unlabeled;
use Rubix\ML\Extractors\CSV;
use Rubix\ML\Clusterers\KMeans;
use Rubix\ML\Kernels\Distance\Euclidean;
use Rubix\ML\Clusterers\Seeders\PlusPlus;

$dataset = Labeled::fromIterator(new CSV('datasets/IMFdata.csv', true, ',')); //(file, header, delimiter)
//$dataset->apply(new NumericStringConverter());

#statistik deskriptif dataset
#$stats = $dataset->describe();
#echo "<pre>"; print_r($stats); echo "</pre>";

[$training, $testing] = $dataset->stratifiedSplit(0.8);

$estimator = new KMeans(3, 100, 300, 10.0, 10, new Euclidean(), new PlusPlus());

$estimator->train($training);

$predictions = $estimator->predict($testing);


echo "<pre>"; print_r($predictions); echo "</pre>";
//echo "<pre>"; print_r($testing->labels()); echo "</pre>";