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

    function displayColumns($database) {
        $SQLstatement = "DESC arenes";
        $recordSet = $database->query($SQLstatement);
        foreach ($recordSet as $field) {
            echo "<td>" . str_replace("_", " ", $field[0]) . "</td>";
        }
    }

    function displayInformation($database, $compound) {
        $SQLstatement = "SELECT * FROM arenes WHERE denomination LIKE \"" . $compound . "\";";
        $recordSet = $database->query($SQLstatement);
        foreach ($recordSet as $field) {
            echo "<td>" . $field[0] . "</td><td>" . $field[1] . "</td><td>" . $field[2] . "u" . "</td><td>" . $field[3] . "°C" . "</td><td>" . $field[4] . "°C" . "</td><td>" . $field[5] . "°C" . "</td><td>" . $field[6] . "</td>";
        }
    }

}
