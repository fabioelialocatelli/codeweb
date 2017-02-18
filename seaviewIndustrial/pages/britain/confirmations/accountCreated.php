<?php
require_once '../../../modules/databaseConnector.php';
require_once '../../../modules/accountManager.php';

$credentials = simplexml_load_file('../../../credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->salesDatabase);
$accountManager = new accountManager($databaseConnector->connectDatabase());
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
            <p id = "registrationAlert"></p>
        </div>
    </body>
    <?php echo $accountManager->greetAccount(); ?>
</html>