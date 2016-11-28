<?php

// Create connection
$con = mysqli_connect("localhost","root","password","databasename");

// Check connection
if (mysqli_connect_errno()) {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$return_arr = array();

$query = "SELECT * FROM `Flight_Data` ORDER BY RAND() LIMIT 100";

$result = mysqli_query($con, $query);


while ($row = mysqli_fetch_array($result)) {

    $row_array['ID'] = $row['ID'];
    $row_array['OriginLat'] = $row['OriginLat'];
    $row_array['OriginLong'] = $row['OriginLong'];
    $row_array['DestinLat'] = $row['DestinLat'];
    $row_array['DestinLong'] = $row['DestinLong'];
    $row_array['OrignAirport'] = $row['OrignAirport'];
    $row_array['AircraftSegment'] = $row['AircraftSegment'];
    array_push($return_arr,$row_array);
}

$jsonarray = json_encode($return_arr);
header('Content-Type: application/json');
// echo $jsonarray;
echo json_encode($return_arr, JSON_PRETTY_PRINT);



?>