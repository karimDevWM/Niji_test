<?php

$csv = "data.csv";

function csvToArray($csvFile){
 
    $read_csv = fopen($csvFile, 'r');
 
    while (!feof($read_csv) ) {
        $lines[] = fgetcsv($read_csv, 1000, ',');
 
    }
 
    fclose($read_csv);
    return $lines;
}
 
//read the csv file into an array
$csv = 'data.csv';
$data = csvToArray($csv);
 
// render the array with print_r
echo '<pre>';
print_r($data);
echo '</pre>';



?>