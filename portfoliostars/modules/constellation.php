<?php

header('Content-type: text/html; charset=utf8');
require_once("json.php");

$credentials = simplexml_load_file('../credentials.xml');
$databaseConnection = mysqli_connect($credentials->hostname, $credentials->username, $credentials->password, $credentials->database);
mysqli_set_charset($databaseConnection, "utf8");

$selectedConstellation = "SELECT 
    *
FROM
    bayer.stellarConsole
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