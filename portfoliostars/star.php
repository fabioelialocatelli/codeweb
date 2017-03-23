<?php 

header('Content-type: text/html; charset=utf8');

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
    denomination = '" . $_GET["selectedStar"] . "';";

$databaseQuery = mysqli_query($databaseConnection, $selectedStar);

while ($recordSet = mysqli_fetch_array($databaseQuery)) {
    echo "Denomination: " . ($recordSet[0]) . "\n";
    echo "Designation: " . ($recordSet[1]) . "\n";
    echo "Identifier HD: " . ($recordSet[2]) . "\n";
    echo "Identifier HIP: " . ($recordSet[3]) . "\n";
    echo "Identifier SAO: " . ($recordSet[4]) . "\n";
}