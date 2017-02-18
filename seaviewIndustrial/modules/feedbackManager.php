<?php

class feedbackManager {

    private $databaseObject;

    public function __construct($databaseInstance) {
        $this->databaseObject = $databaseInstance;
    }

    public function __destruct() {
        
    }

    function postFeedback() {
        if (isset($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["phoneNumber"], $_POST["streetAddress"], $_POST["municipality"], $_POST["postCode"], $_POST["feedback"])) {
            $firstNameField = htmlspecialchars($_POST["firstName"]);
            $lastNameField = htmlspecialchars($_POST["lastName"]);
            $emailField = htmlspecialchars($_POST["email"]);
            $phoneNumberField = htmlspecialchars($_POST["phoneNumber"]);
            $streetAddressField = htmlspecialchars($_POST["streetAddress"]);
            $municipalityField = htmlspecialchars($_POST["municipality"]);
            $postCodeField = htmlspecialchars($_POST["postCode"]);
            $feedbackField = htmlspecialchars($_POST["feedback"]);

            if (!($feedbackField == null)) {
                $SQLstatement = "CALL postFeedback('$firstNameField', '$lastNameField', '$streetAddressField', '$municipalityField', '$emailField', '$phoneNumberField', '$postCodeField', '$feedbackField');";
                $this->databaseObject->exec($SQLstatement);
                header('Location:http://localhost/seaviewIndustrial/pages/britain/confirmations/feedbackPosted.php');
            }
        }
    }

    function postRemoval() {
        if (isset($_POST["removalReason"])) {
            $removalField = htmlspecialchars($_POST["removalReason"]);
            if (!($removalField == null)) {
                $SQLstatement = "CALL postRemoval('$removalField');";
                $feedbackSubmissionOperation = $this->databaseObject->exec($SQLstatement);
                echo $this->checkFeedbackSubmission($feedbackSubmissionOperation);
            } else if (!($removalField == null) && isset($_SESSION["currentUser"])) {
                $user = $_SESSION["currentUser"];
                $SQLstatement = "CALL postRemoval('$removalField. Yours sincerely $user.');";
                $this->databaseObject->exec($SQLstatement);
                header('Location:http://localhost/seaviewIndustrial/pages/britain/confirmations/feedbackPosted.php');
            }
        }
    }

    function checkFeedbackSubmission() {
        return "<script type = \"text/javascript\">document.getElementById(\"feedbackAlert\").style.color = \"rgb(230, 230, 0)\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"feedbackAlert\").style.backgroundColor = \"rgb(0, 0, 0)\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"feedbackAlert\").style.display = \"inline-block\";</script>"
                . "<script type = \"text/javascript\">document.getElementById(\"feedbackAlert\").innerHTML = \"Cool! Your feedback has been successfully posted.\";</script>";
    }

}
