<?php
require_once '../../modules/databaseConnector.php';
require_once '../../modules/storeManager.php';
require_once '../../modules/feedbackManager.php';

$credentials = simplexml_load_file('../../credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->reviewsDatabase);
$feedbackManager = new feedbackManager($databaseConnector->connectDatabase());
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
        <a class = "pageLink" href="sell.php">Sell</a>
        <a class = "pageLink" href="login.php">Login</a>
        <a class = "pageLink" href="register.php">Register</a>
    </nav>
    <section>
        <div>
            <form method = "post">
                <p id = "feedbackAlert"></p>
                <input id = "firstName" type = "text" name = "firstName" placeholder = "First Name" onBlur = "validateField('firstName', 'feedbackAlert', 'postEnquiry')">
                <input id = "lastName" type = "text" name = "lastName" placeholder = "Family Name" onBlur = "validateField('lastName', 'feedbackAlert', 'postEnquiry')">
                <input id = "email" type = "text" name = "email" placeholder = "E-Mail" onBlur = "validateField('email', 'feedbackAlert', 'postEnquiry')">
                <input id = "streetAddress" type = "text" name = "streetAddress" placeholder = "Street Adress" onBlur = "validateField('streetAddress', 'feedbackAlert', 'postEnquiry')">
                <input id = "phoneNumber" type = "text" name = "phoneNumber" placeholder = "Phone Number" onBlur = "validateField('phoneNumber', 'feedbackAlert', 'postEnquiry')">
                <input id = "municipality" type = "text" name = "municipality" placeholder = "Municipality" onBlur = "validateField('municipality', 'feedbackAlert', 'postEnquiry')">
                <input type = "text" name = "postCode" placeholder = "Post Code">
                <textarea id = "feedback" name = "feedback" placeholder = "Your Enquiry"></textarea>
                <input type = "submit" value = "Post Enquiry" id = "postEnquiry">
                <?php echo $feedbackManager->postFeedback(); ?>
            </form>
        </div>
    </section>
    <footer><div class="disclaimer">Copyright 1970-2016 Seaview Industrial Ltd. All rights reserved. You may use our content after being granted formal permission.</div></footer>
    <script type="text/javascript" src="../../scripts/british/formValidation.js"></script>
</body>