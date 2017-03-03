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

    public function connectDatabase() {
        try {
            $this->databaseInstance = new PDO($this->databaseAddress, $this->username, $this->password, $this->encoding);
            $this->databaseInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->databaseInstance;
        } catch (PDOException $error) {
            return "<p>Cannot connect to the specified database: " . $error->getMessage() . "</p>";
        }
    }

}
