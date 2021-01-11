<?php

$apiKey = "bcad3f7e8ff57bd648fb421990fd1113";
$cityId = "1279233";



$weathUrl ="http://api.openweathermap.org/data/2.5/weather?id=".$cityId."&lang=en&units=metric&appid=".$apiKey;


$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $weathUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

curl_close($ch);


$data = json_decode($response);

//print_r($data); 
$myarray = array('mydatas'=>$data);
header('Content-Type: application/json');
echo json_encode($myarray);




?>