<?php

require_once("jsonServices.php");
$databaseConnection = mysqli_connect("localhost", "root", "", "bayer");
mysqli_set_charset($databaseConnection, "utf8");

$databaseStatement = "SELECT * FROM stellarParameters WHERE denomination = '" . $_POST["stellarDenomination"] . "';";
$databaseQuery = mysqli_query($databaseConnection, $databaseStatement);

if (mysqli_affected_rows($databaseConnection) > 0) {
    $recordSet = mysqli_fetch_array($databaseQuery);
    $instanceJSON = new Services_JSON();
    $stellarJSON = $instanceJSON->encode($recordSet);
    echo($stellarJSON);
}