<?php

header('Content-type: text/html; charset=utf8');
require_once("jsonServices.php");

$databaseConnection = mysqli_connect("localhost", "root", "", "bayer");
mysqli_set_charset($databaseConnection, "utf8");

$selectedStar = "SELECT 
    denomination,
    designation,
    identifierHD,
    identifierHIP,
    identifierSAO
FROM
    bayer.stellarIdentifiers
WHERE
    denomination = '" . $_POST["selectedStar"] . "';";

$databaseQuery = mysqli_query($databaseConnection, $selectedStar);

if (mysqli_affected_rows($databaseConnection) > 0) {

    $stellarParameters = mysqli_fetch_assoc($databaseQuery);

    $JSON = new Services_JSON();
    $stellarData = $JSON->encode($stellarParameters);
    echo($stellarData);
} else {
    echo('false');
}