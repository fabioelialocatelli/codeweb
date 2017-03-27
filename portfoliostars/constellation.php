<?php

header('Content-type: text/html; charset=utf8');
require_once("jsonServices.php");

$databaseConnection = mysqli_connect("localhost", "root", "", "bayer");
mysqli_set_charset($databaseConnection, "utf8");

$selectedConstellation = "SELECT 
    *
FROM
    bayer.stellarParameters
WHERE
    designation LIKE '%" . $_POST["selectedConstellation"] . "';";

$databaseQuery = mysqli_query($databaseConnection, $selectedConstellation);

if (mysqli_affected_rows($databaseConnection) > 0) {

    $stellarRecords = array();

    while ($recordSet = mysqli_fetch_assoc($databaseQuery)) {
        $stellarRecords[] = $recordSet;
    }

    $JSON = new Services_JSON();
    $stellarData = $JSON->encode($stellarRecords);
    echo($stellarData);
} else {
    echo('false');
}
