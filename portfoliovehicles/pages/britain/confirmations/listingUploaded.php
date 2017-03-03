<?php
require_once '../../../modules/databaseConnector.php';
require_once '../../../modules/storeManager.php';

$credentials = simplexml_load_file('../../../credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->reviewsDatabase);
$storeManager = new storeManager($databaseConnector->connectDatabase());
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Seaview Industrial</title>
        <link rel="icon" type="image/png" href ="../../../motif/shopFavicon.png">
        <link rel="stylesheet" type="text/css" href="../../../motif/shopTheme.css">
    </head>
    <body>
        <nav>
            <a class = "pageLink" href="../account.php">Account</a>
            <a class = "pageLink" href="../homepage.php">Home</a>
            <a class = "pageLink" href="../brands.php">Brands</a>
            <a class = "pageLink" href="../catalog.php">Catalogue</a>
            <a class = "pageLink" href="../sell.php">Sales</a>
            <a class = "pageLink" href="../contact.php">Contact</a>
            <a class = "pageLink" href="../login.php">Login</a>
            <a class = "pageLink" href="../register.php">Register</a>
        </nav>
        <div>
            <p id = "listingIdentifier"></p>
        </div>
        <?php
        if (isset($_SESSION["currentUser"], $_SESSION["listingIdentifier"])) {
            echo $storeManager->checkListingIdentifier($_SESSION["currentUser"], $_SESSION["listingIdentifier"]);
        }
        ?>
    </body>
</html>
