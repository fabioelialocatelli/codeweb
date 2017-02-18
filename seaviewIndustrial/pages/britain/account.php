<?php
require_once '../../modules/databaseConnector.php';
require_once '../../modules/accountManager.php';
require_once '../../modules/contentGenerator.php';

$credentials = simplexml_load_file('../../credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->salesDatabase);

$accountManager = new accountManager($databaseConnector->connectDatabase());
$contentGenerator = new contentGenerator();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seaview Industrial</title>
        <link rel="icon" type="image/png" href ="../../motif/shopFavicon.png">
        <link rel="stylesheet" type="text/css" href="../../motif/shopTheme.css">
    </head>
    <body>
        <nav>
            <a class = "pageLink" href="homepage.php">Home</a>
            <a class = "pageLink" href="brands.php">Brands</a>
            <a class = "pageLink" href="catalog.php">Catalogue</a>
            <a class = "pageLink" href="sell.php">Sales</a>
            <a class = "pageLink" href="contact.php">Contact</a>
            <a class = "pageLink" href="login.php">Login</a>
            <a class = "pageLink" href="register.php">Register</a>
        </nav>
        <section>
            <?php echo $contentGenerator->greetUser(); ?>
            <div class="carousel">
                <?php echo $accountManager->displayListingInformation(); ?>
            </div>
        </section>
        <footer><div class="disclaimer">Copyright 1970-2016 Seaview Industrial Ltd. All rights reserved. You may use our content after being granted formal permission.</div></footer>
    </body>
</html>
