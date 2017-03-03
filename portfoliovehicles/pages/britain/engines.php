<?php
require_once '../../modules/databaseConnector.php';
require_once '../../modules/catalogManager.php';

$credentials = simplexml_load_file('../../credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->productsDatabase);
$catalogManager = new catalogManager($databaseConnector->connectDatabase());
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
        <a class = "pageLink" href="register.php">Register</a>
    </nav>
    <section>
        <div>
            <form method="post">
                <div class = "selection">
                    <label>Manufacturer</label>
                    <select name="manufacturerSelection">
                        <option value="Detroit Diesel">Detroit Diesel</option>
                        <option value="Navistar">Navistar</option>
                        <option value="Paccar">Paccar</option>
                        <option value="Scania">Scania</option>
                    </select>
                </div>
                <div class="selection">
                    <input type="submit" value="Search">
                </div>
            </form>
        </div>
        <div class ="carousel">
            <?php echo $catalogManager->displayEngineInformation(); ?>
        </div>
    </section>
    <footer><div class="disclaimer">Copyright 1970-2016 Seaview Industrial Ltd. All rights reserved. You may use our content after being granted formal permission.</div></footer>
</body>
