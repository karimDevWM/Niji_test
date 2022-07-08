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

function changeName($data)
{
    for($w=0;$w<count($data);$w+=2)
    {
        if($data[$w]==' C')
        {
            $data[$w] = 'Conservative Party';
        }
        elseif($data[$w]==' L')
        {
            $data[$w] = 'Labour Party';
        }
        elseif($data[$w]==' LD')
        {
            $data[$w] = 'Liberal Democrats';
        }
        elseif($data[$w]==' G')
        {
            $data[$w] = 'Green Party';
        }
        elseif($data[$w]==' Ind')
        {
            $data[$w] = 'Independent';
        }
    }
    return $data;
}

$data[0] = changeName($data[0]);
$data[1] = changeName($data[1]);
$data[2] = changeName($data[2]);

function purcentageVotes($data)
{
    $sum=0;
    for($i=1;$i<count($data);$i+=2)
    {
        $sum = $sum + $data[$i];
    }
    for($j=1;$j<count($data);$j+=2)
    {
        $data[$j] = round($data[$j]/$sum*100, 2);
    }
    return $data;
}

$data[0] = purcentageVotes($data[0]);
$data[1] = purcentageVotes($data[1]);
$data[2] = purcentageVotes($data[2]);

// N.B : Tri non réussi

// asort($data[0]);
// echo $data[0];

// render the array with print_r
echo '<pre>';
print_r($data);
echo '</pre>';

$filename = 'output.csv';

// open csv file for writing
$f = fopen($filename, 'w');

if ($f === false) {
	die('Error opening the file ' . $filename);
}

// write each row at a time to a file
foreach ($data as $row) {
	fputcsv($f, $row);
}

// close the file
fclose($f);

?>