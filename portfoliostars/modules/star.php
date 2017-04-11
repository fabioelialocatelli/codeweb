<?php

header('Content-type: text/html; charset=utf8');
require_once("json.php");

$credentials = simplexml_load_file('../credentials.xml');
$databaseConnection = mysqli_connect($credentials->hostname, $credentials->username, $credentials->password, $credentials->database);
mysqli_set_charset($databaseConnection, "utf8");

$selectedStar = "SELECT 
    *
FROM
    bayer.stellarConsole
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