<?php

class catalogManager {

    private $databaseObject;

    public function __construct($databaseInstance) {
        $this->databaseObject = $databaseInstance;
    }

    public function __destruct() {
        
    }

    function displayDiggerInformation() {
        if (isset($_POST["manufacturerSelection"])) {
            $manufacturer = htmlspecialchars($_POST["manufacturerSelection"]);
            $SQLstatement = "SELECT `model`, `power`, `torque`, `displacement`, `bore`, `stroke`, `weight`, `price`, `imageReference` FROM `manufacturer` LEFT JOIN `digger` ON `manufacturer`.`manufacturer_id` = `digger`.`manufacturer_id` where `manufacturer`.`denomination` = '$manufacturer';";
            $vehicleCounter = 0;
            foreach ($this->databaseObject->query($SQLstatement) as $field) {
                echo "<div class = \"product\">";
                echo "<img id = \"vehicle$vehicleCounter\" src = \"$field[8]\">";
                echo "<p class =\"dataSheet\"><table>";
                echo "<tr><th>Model</th><td>$field[0]</td></tr>";
                echo "<tr><th>Power</th><td>$field[1] kW</td></tr>";
                echo "<tr><th>Torque</th><td>$field[2] Nm</td></tr>";
                echo "<tr><th>Displacement</th><td>$field[3] L</td></tr>";
                echo "<tr><th>Bore</th><td>$field[4] mm</td></tr>";
                echo "<tr><th>Stroke</th><td>$field[5] mm</td></tr>";
                echo "<tr><th>Weight</th><td>$field[6] kg</td></tr>";
                echo "<tr><th>Customer Price</th><td>$field[7] USD</td></tr>";
                echo "</table></p>";
                echo "</div>";
                ++$vehicleCounter;
            }
        }
    }

    function displayEngineInformation() {
        if (isset($_POST["manufacturerSelection"])) {
            $manufacturer = htmlspecialchars($_POST["manufacturerSelection"]);
            $SQLstatement = "SELECT `denomination`, `configuration`, `model`, `displacement`, `compressionRatio`, `bore`, `stroke`, `powerRange`, `torqueRange`, `weight`, `imageReference` FROM `manufacturer` LEFT JOIN `engine` ON `manufacturer`.`manufacturer_id` = `engine`.`manufacturer_id` where `manufacturer`.`denomination` = '$manufacturer';";
            $vehicleCounter = 0;
            foreach ($this->databaseObject->query($SQLstatement) as $field) {
                echo "<div class = \"product\">";
                echo "<img id = \"vehicle$vehicleCounter\" src = \"$field[10]\">";
                echo "<p class =\"dataSheet\"><table>";
                echo "<tr><th>Manufacturer</th><td>$field[0]</td></tr>";
                echo "<tr><th>Configuration</th><td>$field[1]</td></tr>";
                echo "<tr><th>Model</th><td>$field[2]</td></tr>";
                echo "<tr><th>Displacement</th><td>$field[3] L</td></tr>";
                echo "<tr><th>Compression Ratio</th><td>$field[4]</td></tr>";
                echo "<tr><th>Bore</th><td>$field[5] mm</td></tr>";
                echo "<tr><th>Stroke</th><td>$field[6] mm</td></tr>";
                echo "<tr><th>Power Range</th><td>$field[7] HP</td></tr>";
                echo "<tr><th>Torque Range</th><td>$field[8] Nm</td></tr>";
                echo "<tr><th>Weight</th><td>$field[9] kg</td></tr>";
                echo "</table></p>";
                echo "</div>";
                ++$vehicleCounter;
            }
        }
    }

    function displayTruckInformation() {
        if (isset($_POST["manufacturerSelection"])) {
            $manufacturer = htmlspecialchars($_POST["manufacturerSelection"]);
            $SQLstatement = "SELECT `model`, `sleeperCabin`, `minimumPower`, `maximumPower`, `price`, `imageReference` FROM `manufacturer` LEFT JOIN `onHighwayTruck` ON `manufacturer`.`manufacturer_id` = `onHighwayTruck`.`manufacturer_id` where `manufacturer`.`denomination` = '$manufacturer';";
            $vehicleCounter = 0;
            foreach ($this->databaseObject->query($SQLstatement) as $field) {
                echo "<div class = \"product\">";
                echo "<img id = \"vehicle$vehicleCounter\" src = \"$field[5]\">";
                echo "<p class =\"dataSheet\"><table>";
                echo "<tr><th>Model</th><td>$field[0]</td></tr>";
                echo "<tr><th>Sleeper Cabin</th><td>$field[1]</td></tr>";
                echo "<tr><th>Minimum Power</th><td>$field[2] HP</td></tr>";
                echo "<tr><th>Maximum Power</th><td>$field[3] HP</td></tr>";
                echo "<tr><th>Customer Price</th><td>$field[4] USD</td></tr>";
                echo "</table></p>";
                echo "</div>";
                ++$vehicleCounter;
            }
        }
    }

}
