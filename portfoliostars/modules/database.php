<?php

require_once("../libraries/json.php");

/* $databasePath = explode(".", $_POST["stellarDatabase"]);
 * $databaseConnection = mysqli_connect("localhost", "root", "", $databaseSchema);
  $databaseSchema = reset($databasePath); */

$databaseConnection = mysqli_connect("localhost", "root", "", "bayer");
mysqli_set_charset($databaseConnection, "utf8");

$databaseStatement = "SELECT * FROM stellarParameters WHERE denomination='" . $_POST["stellarDenomination"] . "';";
$databaseQuery = mysqli_query($databaseConnection, $databaseStatement);

if (mysqli_affected_rows($databaseConnection) > 0) {
    $dataSet = mysqli_fetch_array($databaseQuery);
    $instanceJSON = new Services_JSON();
    $valuesJSON = $instanceJSON->encode($dataSet);
    echo($valuesJSON);
} else {
    echo('false');
}