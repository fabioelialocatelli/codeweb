<?php
require_once '../../modules/databaseConnector.php';
require_once '../../modules/storeManager.php';
require_once '../../modules/feedbackManager.php';

$credentials = simplexml_load_file('../../credentials.xml');
$salesDatabase = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->salesDatabase);
$reviewsDatabase = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->reviewsDatabase);

$storeManager = new storeManager($salesDatabase->connectDatabase());
$feedbackManager = new feedbackManager($reviewsDatabase->connectDatabase());
?>

<head>
    <meta charset="UTF-8">
    <title>Seaview Industrial</title>
    <link rel="icon" type="image/png" href ="../../motif/shopFavicon.png">
    <link rel="stylesheet" type="text/css" href="../../motif/shopTheme.css">
</head>
<body>
    <nav>
        <a class = "pageLink" href="account.php">Account</a>
        <a class = "pageLink" href="homepage.php">Home</a>
        <a class = "pageLink" href="brands.php">Brands</a>
        <a class = "pageLink" href="catalog.php">Catalogue</a>
        <a class = "pageLink" href="contact.php">Contact</a>
        <a class = "pageLink" href="login.php">Login</a>
        <a class = "pageLink" href="register.php">Register</a>
    </nav>
    <section>
        <div class="presentation"> In order to access the following functionality you need to be a registered user; should that not be your case consider to
            visit our registration page. Please complete the following form; a listing ticket will be stored in our system.
        </div>
        <div class ="forms">
            <div class = "form">
                <form method = "post" enctype = "multipart/form-data">
                    <p id = "saleAlert"></p>
                    <input type = "text" id = "make" name = "postMake" placeholder = "Make" onBlur = "validateField('make', 'validationAlert', 'postRequest')">
                    <input type = "text" id = "model" name = "postModel" placeholder = "Model" onBlur = "validateField('model', 'validationAlert', 'postRequest')">
                    <input type = "text" id = "year" name = "postYear" placeholder = "Year" onBlur = "validateField('year', 'validationAlert', 'postRequest')">
                    <input type = "text" id = "mileage" name = "postMileage" placeholder = "Mileage" onBlur = "validateField('mileage', 'validationAlert', 'postRequest')">
                    <input type = "file" name = "postImage">
                    <textarea name = "saleReason" placeholder = "Sale Reason"></textarea>
                    <input type = "submit" value = "Add Vehicle" id = "postRequest" name = "postRequest">
                    <?php echo $storeManager->postVehicle(); ?>
                </form>
            </div>
            <div class = "form">
                <form method = "post">
                    <p id = "removalAlert"></p>
                    <input type = "text" id = "listing" name = "listingField" placeholder = "Listing ID" onBlur = "validateField('listing', 'validationAlert', 'deleteRequest')">
                    <textarea name = "removalReason" placeholder = "Removal Reason"></textarea>
                    <input type = "submit" value = "Remove Vehicle" id = "deleteRequest" name = "deleteRequest">
                    <?php echo $storeManager->deleteVehicle(); ?>
                    <?php echo $feedbackManager->postRemoval(); ?>
                </form>
            </div>
            <p id = "validationAlert"></p>
        </div>
    </section>
    <footer><div class="disclaimer">Copyright 1970-2016 Seaview Industrial Ltd. All rights reserved. You may use our content after being granted formal permission.</div></footer>
    <script type="text/javascript" src="../../scripts/british/formValidation.js"></script>
</body>