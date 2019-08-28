<?php

/**
 * Variables 
 * data => the main data as string
 * series => the empty array for all the series found from the -data
 * batch => holds one series found while looping then become empty
 * flagSeries => flag for determining wether the value is for a series or not 
 * largestLengthIndex => holds the largest index for the -series array to find the largest series from the array
 * largestLength => holds the last largest length found comparing the -batch array
 */
$data = "12223334555671123456778"; 
$series = array();
$batch = array();
$flagSeries = false;
$largestLengthIndex = 0;
$largetstLength = 0;

/**
 * Main Loop
 * this loop iterate through the -data string and check for the next value is similer or not 
 * if not, then push the value into the -batch array until found a same value and turn on the flag
 * if same, then push that -batch array into the series, reset -batch array and turn off the flag
 * if last item, then check and perform action as need
 */
echo "Series Pattern Tree: \n";
for ($i = 0, $k = 0; $i < strlen($data); $i++) {

  // Convertion of int is not mandatory, for lower to higher series it using in the statement 
  if ($i != strlen($data) - 1 && $data[$i] != $data[$i+1] && (int) $data[$i] < (int) $data[$i+1]) {
    // DEBUG
    echo !$flagSeries ? '+ ' . $data[$i] : "\n - " . $data[$i];

    array_push($batch, $data[$i]);
    $flagSeries = true;
  } else if ($i != strlen($data) - 1 && $data[$i] == $data[$i+1]) {
    // DEBUG
    echo $flagSeries ? "\n - " . $data[$i] . "\n" : '* ' . $data[$i] . "\n";
    
    if ($flagSeries) {
      array_push($batch, $data[$i]);
      array_push($series, $batch);
    }

    $flagSeries = false;
  } else if ($i == strlen($data) - 1 && $data[$i] != $data[$i - 1]) {
    // DEBUG
    echo $flagSeries ? "\n - " . $data[$i] . "\n" : '';

    if ($flagSeries) {
      array_push($batch, $data[$i]);
      array_push($series, $batch);
    }

    $flagSeries = false;
  } else {
    // DEBUG
    echo !$flagSeries ? '* ' . $data[$i] . "\n" : "\n - " . $data[$i] . "\n";

    if ($flagSeries) {
      array_push($batch, $data[$i]);
      array_push($series, $batch);
    }

    $flagSeries = false;
  }

  if (sizeof($batch) > $largetstLength && !$flagSeries) {
    $largetstLength = sizeof($batch);
    $largestLengthIndex = sizeof($series) - 1;
  }

  if (!$flagSeries) {
    $batch = array();
  }

}

/**
 * Show Result
 */
$lengths = array_map('sizeof', $series);
echo "Way - 1 - (not the best way)\n";
echo "Largest array length: " . max($lengths) . "\n";
echo "Largest array values: " . implode($series[array_search(max($lengths), $lengths)]);

echo "\nWay - 2 - (the best way)\n";
echo "Largest array length: " . $largetstLength . "\n";
echo "Largest array values: " . implode($series[$largestLengthIndex]);
