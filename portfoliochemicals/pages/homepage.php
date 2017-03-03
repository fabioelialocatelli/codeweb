<?php
require_once ('../modules/databaseConnector.php');
$credentials = simplexml_load_file('../credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->database);
$databaseConnection = $databaseConnector->connectDatabase();
?>
<html>
    <head> 
        <meta charset = "UTF-8">
        <title>Seaview Aromatics</title>
        <link rel = "stylesheet" href = "../motif/storeTheme.css" type = "text/css" media = "all">
    </head>
    <body>
        <p id = "alert"></p>
        <div id = "content">
            <div id = "storeInformation">
                <p>Aromatic hydrocarbons wholesaler located in the vibrant industrial center of the Hutt Valley. All of our products are characterised by laboratory grade purity</p>
            </div>
            <div>
                <p>Please feel free to browse our website; commence by browsing our product catalogue and eventually registering.</p>
                <div id = "pageLinks">
                    <a href = "catalogue.php">Our Catalogue</a>
                </div>
            </div>
        </div>
        <div id = "contactDetails">
            <p id = "address">6 Volkner Grove, Waterloo, Lower Hutt, 5011</p>
            <p><a class = "email" href = "mailto:seaviewAromatics@gmail.com">seaviewAromatics@gmail.com</a></p>
        </div>
    </body>
</html>