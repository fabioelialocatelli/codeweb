<?php 

header('Content-type: text/html; charset=utf8');

$databaseConnection = mysqli_connect("localhost", "root", "", "bayer");
mysqli_set_charset($databaseConnection, "utf8");

$selectedConstellation = "SELECT 
    *
FROM
    bayer.stellarParameters
WHERE
    designation LIKE '%" . $_GET["selectedConstellation"] . "';";

$databaseQuery = mysqli_query($databaseConnection, $selectedConstellation);

echo "<table>";
echo "<thead>";
echo "<tr>";
echo "<th>Denomination</th>";
echo "<th>Designation</th>";
echo "<th>Solar Diameter</th>";
echo "<th>Absolute Luminosity</th>";
echo "<th>Bolometric Luminosity</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

while ($recordSet = mysqli_fetch_array($databaseQuery)) {

    echo "<tr>";
    echo "<td>" . ($recordSet[0]) . "</td>";
    echo "<td>" . ($recordSet[1]) . "</td>";
    echo "<td>" . ($recordSet[2]) . "</td>";
    echo "<td>" . ($recordSet[3]) . "</td>";
    echo "<td>" . ($recordSet[4]) . "</td>";
    echo "</tr>";
}

echo "</tbody>";
echo "</table>";
