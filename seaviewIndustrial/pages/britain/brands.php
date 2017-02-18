<?php
require_once '../../modules/contentGenerator.php';
$contentGenerator = new contentGenerator();
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
        <a class = "pageLink" href="catalog.php">Catalogue</a>
        <a class = "pageLink" href="sell.php">Sales</a>
        <a class = "pageLink" href="contact.php">Contact</a>
        <a class = "pageLink" href="login.php">Login</a>
        <a class = "pageLink" href="register.php">Register</a>
    </nav>
    <section>
        <div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/astra.jpg">
                <p  class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/astra.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.iveco-astra.com/en/">http://www.iveco-astra.com/en/</a>
                </p>
            </div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/caterpillar.jpg">
                <p class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/caterpillar.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.cat.com/">http://www.cat.com/</a>
                </p>
            </div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/daf.jpg">
                <p class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/daf.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.daf.com/en/">http://www.daf.com/en/</a>
                </p>
            </div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/hino.jpg">
                <p class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/hino.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.hino.com/">http://www.hino.com/</a>
                </p>
            </div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/international.jpg">
                <p class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/international.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.internationaltrucks.com/">http://www.internationaltrucks.com/</a>
                </p>
            </div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/kenworth.jpg">
                <p class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/kenworth.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.kenworth.com/">http://www.kenworth.com/</a>
                </p>
            </div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/peterbilt.jpg">
                <p class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/peterbilt.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.peterbilt.com/">http://www.peterbilt.com/</a>
                </p></div>
            <div class = "canvas"><img class = "manufacturerLogo" src = "../../logos/ws.jpg">
                <p class = "manufacturerDescription">
                    <?php
                    $contentGenerator->describeManufacturer("../../manufacturers/british/ws.txt");
                    ?>
                    For more information visit <a class = "manufacturerSite" href = "http://www.westernstartrucks.com/">http://www.westernstartrucks.com/</a>
                </p>
            </div>
        </div>
    </section>
    <footer><div class="disclaimer">Copyright 1970-2016 Seaview Industrial Ltd. All rights reserved. You may use our content after being granted formal permission.</div></footer>
</body>