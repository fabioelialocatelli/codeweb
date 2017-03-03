<?php

class contentGenerator {

    public function __construct() {
        
    }

    public function __destruct() {
        
    }

    function describeManufacturer($manufacturerDescription) {
        try {
            $description = fopen($manufacturerDescription, "r");
            echo fread($description, filesize($manufacturerDescription));
            fclose($description);
        } catch (Exception $noFile) {
            echo $noFile->getMessage();
        }
    }
    
    function greetUser(){
        if(isset($_SESSION["currentUser"])){
            $user = $_SESSION["currentUser"];
            return "<div class=\"presentation\">Dear $user, these are the listings associated with your account. Should you have any queries do
                not hesitate to contact our friendly sales team. We will get to you as soon as humanly possible.
            </div>";
        } else {
            return "<div class=\"presentation\">Dear customer, you are required to log in or register before being able to access this content.
            </div>";
        }
    }

}
