<?php

session_start();

class storeManager {

    private $databaseObject;

    public function __construct($databaseInstance) {
        $this->databaseObject = $databaseInstance;
    }

    public function __destruct() {
        
    }

    function uploadVehicleImage() {
        $name = $_FILES["postImage"]["name"];
        if ($_FILES["postImage"]["error"] == UPLOAD_ERR_OK) {
            $temporaryFile = $_FILES["postImage"]["tmp_name"];
            $uploadFolder = "C:\\Apache\\htdocs\\seaviewIndustrial\\uploads\\";

            if (!file_exists($uploadFolder . $name)) {
                move_uploaded_file($temporaryFile, $uploadFolder . $name);
            }
            return $uploadFolder . $name;
        }
    }

    function postVehicle() {
        if (isset($_POST["postMake"], $_POST["postModel"], $_POST["postYear"], $_POST["postMileage"], $_POST["saleReason"]) && (!($_FILES["postImage"] === ""))) {

            $username = $_SESSION["currentUser"];
            $makeField = htmlspecialchars($_POST["postMake"]);
            $modelField = htmlspecialchars($_POST["postModel"]);
            $yearField = htmlspecialchars($_POST["postYear"]);
            $mileageField = htmlspecialchars($_POST["postMileage"]);
            $saleReasonField = htmlspecialchars($_POST["saleReason"]);

            $vehicleImageLocation = $this->uploadVehicleImage();
            $escapedVehicleImageLocation = str_replace("\\", "/", $vehicleImageLocation);

            if (!($username == null)) {

                $postVehicle = "CALL postVehicle('$makeField', '$modelField', '$yearField', '$mileageField', '$saleReasonField', '$escapedVehicleImageLocation', '$username');";
                $uploadOperation = $this->databaseObject->exec($postVehicle);
                $_SESSION["uploadOperation"] = $uploadOperation;

                $getIdentifier = "SELECT `vehicleIdentifier` FROM `vehicle` WHERE `make` = '$makeField' AND `model` = '$modelField' AND `mileage` = '$mileageField' AND `year` = '$yearField' AND `saleReason` = '$saleReasonField';";
                $retrievalOperation = $this->databaseObject->prepare($getIdentifier);
                $retrievalOperation->execute();
                $resultSet = $retrievalOperation->fetch();
                $listingIndentifier = $resultSet[0];
                $_SESSION["listingIdentifier"] = $listingIndentifier;

                header('Location:http://localhost/seaviewIndustrial/pages/britain/confirmations/listingUploaded.php');
            } else {
                header('Location:http://localhost/seaviewIndustrial/pages/britain/login.php');
            }
        }
    }

    function deleteVehicle() {
        if (isset($_POST["listingField"], $_POST["removalReason"])) {
            $username = $_SESSION["currentUser"];
            $listingField = htmlspecialchars($_POST["listingField"]);

            if (!($username == null)) {

                $getListingIdentifier = "SELECT `imageReference` FROM `vehicle` WHERE `vehicleIdentifier` = '$listingField';";
                $retrieval = $this->databaseObject->prepare($getListingIdentifier);
                $retrieval->execute();
                $resultSet = $retrieval->fetch();
                $vehicleImageLocation = $resultSet[0];

                $unescapedVehicleImageLocation = str_replace("/", "\\", $vehicleImageLocation);
                $this->removeListingImage($unescapedVehicleImageLocation);

                $removeVehicle = "CALL removeVehicle('$listingField');";
                $removalOperation = $this->databaseObject->exec($removeVehicle);
                $_SESSION["removalOperation"] = $removalOperation;
                header('Location:http://localhost/seaviewIndustrial/pages/britain/confirmations/listingRemoved.php');
            } else {
                header('Location:http://localhost/seaviewIndustrial/pages/britain/login.php');
            }
        }
    }

    function removeListingImage($imageLocation) {
        if (file_exists($imageLocation)) {
            unlink($imageLocation);
        }
    }

    function checkListingRemoval($userIdentifier, $removalOperation) {
        if ($removalOperation) {
            return "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").style.color = \"rgb(230, 230, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").style.display = \"inline-block\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").innerHTML = \"Cool $userIdentifier! Your listing has been successfully removed...\";</script>";
        } else {
            return "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").style.color = \"rgb(230, 230, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").style.display = \"inline-block\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"removalAlert\").innerHTML = \"Oops! You appear not to be a registered user...\";</script>";
        }
    }

    function checkListingIdentifier($userIdentifier, $listingIndentifier) {
        if ($listingIndentifier) {
            return "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").style.color = \"rgb(230, 230, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").style.display = \"inline-block\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").innerHTML = \"Thanks for your business $userIdentifier, your listing identifier is $listingIndentifier...\";</script>";
        } else {
            return "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").style.color = \"rgb(230, 230, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").style.display = \"inline-block\";</script>"
                    . "<script type = \"text/javascript\">document.getElementById(\"listingIdentifier\").innerHTML = \"There seem to be no listings associated with that username...\";</script>";
        }
    }

}
