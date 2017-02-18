<?php

class databaseConnector {

    private $host;
    private $port;
    private $username;
    private $password;
    private $encoding;
    private $databaseSchema;
    private $databaseAddress;
    private $databaseInstance;
    private $statement;
    private $recordSet;

    public function __construct($host, $port, $username, $password, $databaseSchema) {
        $this->host = $host;
        $this->port = $port;
        $this->username = $username;
        $this->password = $password;
        $this->databaseSchema = $databaseSchema;
        $this->encoding = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
        $this->databaseAddress = "mysql:host=" . $this->host . ":" . $this->port . ";dbname=" . $this->databaseSchema;
    }

    public function __destruct() {
        $this->host = null;
        $this->port = null;
        $this->username = null;
        $this->password = null;
        $this->databaseSchema = null;
        $this->encoding = null;
        $this->databaseAddress = null;
    }

    function connectDatabase() {
        try {
            $this->databaseInstance = new PDO($this->databaseAddress, $this->username, $this->password, $this->encoding);
            return $this->databaseInstance;
        } catch (PDOException $errorMessage) {
            echo "<h2>Cannot connect to the specified database: " . $errorMessage->getMessage() . "<h2/>";
        }
    }

    function displayRiverData($coordinatesType) {
        $this->statement = "SELECT localName, " . $coordinatesType . " FROM river WHERE " . $coordinatesType . " IS NOT NULL;";
        $this->recordSet = $this->databaseInstance->query($this->statement);

        foreach ($this->recordSet as $row) {

            $riverName = $row['localName'];
            $riverCoordinates = $row[$coordinatesType];
            $safeRiverName = str_replace(" ", "", $riverName);
            $splittedCoordinates = explode(", ", $riverCoordinates);

            if ($coordinatesType === "sourceLocation") {

                $riverAttribute = "River Source";
                $safeRiverAttribute = str_replace(" ", "", $riverAttribute);
                $JSWriter = new JSWriter("hydrographicMap", "Green", $riverAttribute, $safeRiverAttribute, $riverName, $safeRiverName, $splittedCoordinates);
                $JSWriter->populateMap();
            } else if ($coordinatesType === "mouthLocation") {

                $riverAttribute = "River Mouth";
                $safeRiverAttribute = str_replace(" ", "", $riverAttribute);
                $JSWriter = new JSWriter("hydrographicMap", "Red", $riverAttribute, $safeRiverAttribute, $riverName, $safeRiverName, $splittedCoordinates);
                $JSWriter->populateMap();
            }
        }
    }

}

class JSWriter {

    private $markerColour;
    private $riverAttribute;
    private $safeRiverAttribute;
    private $riverName;
    private $safeRiverName;
    private $splittedCoordinates;
    private $mapName;
    private $infoWindowName;
    private $markerName;

    public function __construct($mapName, $markerColour, $riverAttribute, $safeRiverAttribute, $riverName, $safeRiverName, $splittedCoordinates) {
        $this->markerColour = $markerColour;
        $this->riverAttribute = $riverAttribute;
        $this->safeRiverAttribute = $safeRiverAttribute;
        $this->riverName = $riverName;
        $this->safeRiverName = $safeRiverName;
        $this->splittedCoordinates = $splittedCoordinates;
        $this->mapName = $mapName;
        $this->markerName = $this->safeRiverName . $this->safeRiverAttribute . "Marker";
        $this->infoWindowName = $this->safeRiverName . $this->safeRiverAttribute . "Info";
    }

    public function __destruct() {
        $this->markerColour = null;
        $this->riverAttribute = null;
        $this->safeRiverAttribute = null;
        $this->riverName = null;
        $this->safeRiverName = null;
        $this->splittedCoordinates = null;
    }

    function populateMap() {
        echo "\r";
        echo "\t\t\t\t//" . $this->riverName . "\n";
        echo "\t\t\t\tvar " . $this->markerName . " = new google.maps.Marker({\n";
        echo "\t\t\t\ticon: 'http://maps.google.com/mapfiles/ms/icons/" . strtolower($this->markerColour) . "-dot.png',\n";
        echo "\t\t\t\tposition: {lat: " . $this->splittedCoordinates[0] . ", lng: " . $this->splittedCoordinates[1] . "},\n";
        echo "\t\t\t\tmap: " . $this->mapName . "\n";
        echo "\t\t\t\t});\n";
        echo "\t\t\t\tvar " . $this->infoWindowName . " = new google.maps.InfoWindow({\n";
        echo "\t\t\t\t\tcontent: \"" . $this->riverName . " " . $this->riverAttribute . "\"\n";
        echo "\t\t\t\t});\n";
        echo "\t\t\t\tgoogle.maps.event.addListener(" . $this->markerName . ", 'click', function() {\n";
        echo "\t\t\t\t\t" . $this->infoWindowName . ".open(" . $this->mapName . ", " . $this->markerName . ");\n";
        echo "\t\t\t\t});\n";
        echo "\n";
    }

}
