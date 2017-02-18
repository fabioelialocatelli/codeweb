<?php

session_start();

class accountManager {

    private $databaseObject;

    public function __construct($databaseInstance) {
        $this->databaseObject = $databaseInstance;
    }

    public function __destruct() {
        
    }

    function login() {
        if (isset($_POST["loginUsername"], $_POST["loginPassword"])) {
            $usernameField = htmlspecialchars($_POST["loginUsername"]);
            $passwordField = htmlspecialchars($_POST["loginPassword"]);

            $SQLstatement = "SELECT `username`, `password` FROM `sales`.`account` WHERE `username` LIKE '" . $usernameField . "' AND `password` LIKE '" . $passwordField . "';";
            $result = $this->databaseObject->query($SQLstatement);
            $rowsReturned = $result->rowCount();

            if ($rowsReturned == 1) {
                $_SESSION["currentUser"] = $usernameField;

                header('Location:http://localhost/seaviewIndustrial/pages/britain/account.php');
            } else {
                return "<script type = \"text/javascript\">document.getElementById(\"loginAlert\").style.color = \"rgb(230, 230, 0)\";</script>"
                        . "<script type = \"text/javascript\">document.getElementById(\"loginAlert\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                        . "<script type = \"text/javascript\">document.getElementById(\"loginAlert\").style.display = \"inline-block\";</script>"
                        . "<script type = \"text/javascript\">document.getElementById(\"loginAlert\").innerHTML = \"You do not appear to be a user... yet.\";</script>";
            }
        }
    }

    function createAccount() {
        if (isset($_POST["firstName"], $_POST["lastName"], $_POST["username"], $_POST["password"], $_POST["passwordConfirmation"], $_POST["email"], $_POST["phoneNumber"], $_POST["streetAddress"], $_POST["municipality"], $_POST["postCode"])) {
            $firstNameField = htmlspecialchars($_POST["firstName"]);
            $lastNameField = htmlspecialchars($_POST["lastName"]);
            $usernameField = htmlspecialchars($_POST["username"]);
            $passwordField = htmlspecialchars($_POST["password"]);
            $passwordConfirmationField = htmlspecialchars($_POST["passwordConfirmation"]);
            $emailField = htmlspecialchars($_POST["email"]);
            $phoneNumberField = htmlspecialchars($_POST["phoneNumber"]);
            $streetAddressField = htmlspecialchars($_POST["streetAddress"]);
            $municipalityField = htmlspecialchars($_POST["municipality"]);
            $postCodeField = htmlspecialchars($_POST["postCode"]);

            if ($passwordConfirmationField == $passwordField) {
                $SQLstatement = "CALL createAccount('$firstNameField', '$lastNameField', '$streetAddressField', '$municipalityField', '$emailField', '$usernameField', '$passwordField', '$phoneNumberField', '$postCodeField');";
                $this->databaseObject->exec($SQLstatement);
                header('Location:http://localhost/seaviewIndustrial/pages/britain/confirmations/accountCreated.php');
            }
        }
    }

    function displayListingInformation() {
        if (isset($_SESSION["currentUser"])) {
            $user = htmlspecialchars($_SESSION["currentUser"]);
            $SQLstatement = "SELECT `make`, `model`, `mileage`, `year`, `imageReference` FROM `vehicle` where `accountReference` = (select `accountIdentifier` from `account` where `username` = '$user');";
            $vehicleCounter = 0;
            foreach ($this->databaseObject->query($SQLstatement) as $field) {
                $vehicleImage = str_replace("C:/Apache/htdocs/seaviewIndustrial/", "../../", $field[4]);
                echo "<div class = \"product\">";
                echo "<img id = \"vehicle$vehicleCounter\" src = \"$vehicleImage\">";
                echo "<p class =\"dataSheet\"><table>";
                echo "<tr><th>Make</th><td>$field[0]</td></tr>";
                echo "<tr><th>Model</th><td>$field[1]</td></tr>";
                echo "<tr><th>Mileage</th><td>$field[2]</td></tr>";
                echo "<tr><th>Year</th><td>$field[3]</td></tr>";
                echo "</table></p>";
                echo "</div>";
                ++$vehicleCounter;
            }
        }
    }

    function greetAccount() {
        return "<script type = \"text/javascript\">document.getElementById(\"registrationAlert\").style.color = \"rgb(230, 230, 0)\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"registrationAlert\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"registrationAlert\").style.display = \"inline-block\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"registrationAlert\").innerHTML = \"Cool! Your account has been successfully created.\";</script>";
    }

    function logout() {
        if (isset($_POST["logout"])) {
            session_destroy();
            header('Location:http://localhost/seaviewIndustrial/pages/britain/confirmations/sessionTerminated.php');
        }
    }

    function confirmLogout() {
        return "<script type = \"text/javascript\">document.getElementById(\"logoutAlert\").style.color = \"rgb(230, 230, 0)\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"logoutAlert\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"logoutAlert\").style.display = \"inline-block\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"logoutAlert\").innerHTML = \"You have been successfully logged out. Hope to see you soon...\";</script>";
    }

}
