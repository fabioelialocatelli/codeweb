<?php
require_once '../../modules/databaseConnector.php';
require_once '../../modules/accountManager.php';

$credentials = simplexml_load_file('../../credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->salesDatabase);
$accountManager = new accountManager($databaseConnector->connectDatabase());
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
        <a class = "pageLink" href="sell.php">Sales</a>
        <a class = "pageLink" href="contact.php">Contact</a>
        <a class = "pageLink" href="login.php">Login</a>
    </nav>
    <section>
        <div>
            <form method = "post">
                <p id = "registrationAlert"></p>
                <input id = "firstName" type = "text" name = "firstName" placeholder = "First Name" onBlur = "validateField('firstName', 'validationAlert', 'register')">
                <input id = "lastName" type = "text" name = "lastName" placeholder = "Family Name" onBlur = "validateField('lastName', 'validationAlert', 'register')">
                <input id = "username" type = "text" name = "username" placeholder = "Username" onBlur = "validateField('username', 'validationAlert', 'register')">
                <input id = "password" type = "password" name = "password" placeholder = "Password" onBlur = "validatePassword('password', 'passwordConfirmation', 'validationAlert', 'register')">
                <input id = "passwordConfirmation" type = "password" name = "passwordConfirmation" placeholder = "Confirm Password" onBlur = "validatePassword('password', 'passwordConfirmation', 'validationAlert', 'register')">
                <input id = "email" type = "text" name = "email" placeholder = "E-Mail" onBlur = "validateField('email', 'validationAlert', 'register')">
                <input id = "phoneNumber" type = "text" name = "phoneNumber" placeholder = "Phone Number" onBlur = "validateField('phoneNumber', 'validationAlert', 'register')">
                <input id = "streetAddress" type = "text" name = "streetAddress" placeholder = "Street Adress" onBlur = "validateField('streetAddress', 'validationAlert', 'register')">
                <input id = "municipality" type = "text" name = "municipality" placeholder = "Municipality" onBlur = "validateField('municipality', 'validationAlert', 'register')">
                <input type = "text" name = "postCode" placeholder = "Post Code">
                <input type = "submit" value = "Register" id = "register">
                <p id = "validationAlert"></p>
                <?php echo $accountManager->createAccount(); ?>
            </form>
        </div>
    </section>
    <footer><div class="disclaimer">Copyright 1970-2016 Seaview Industrial Ltd. All rights reserved. You may use our content after being granted formal permission.</div></footer>
    <script type="text/javascript" src="../../scripts/british/passwordValidation.js"></script>
    <script type="text/javascript" src="../../scripts/british/formValidation.js"></script>
</body>