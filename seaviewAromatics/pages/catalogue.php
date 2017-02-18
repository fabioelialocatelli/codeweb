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
        <?php
        echo "<div id = \"info_benzene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Benzene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id = "benzene">
            <img src = "../images/Benzene.png">

            <p>
                Benzene, simplest organic, aromatic hydrocarbon and parent compound of numerous important aromatic compounds. Benzene is a colourless liquid with a characteristic odour and is primarily used in the production of polystyrene. It is highly toxic and is a known carcinogen; exposure to it may cause leukaemia. As a result, there are strict controls on benzene emissions. At one time, benzene was obtained almost entirely from coal tar; however, since about 1950, these methods have been replaced by petroleum-based processes. More than half of the benzene produced each year is converted to ethylbenzene, then to styrene, and then to polystyrene. The next largest use of benzene is in the preparation of phenol. Other uses include the preparation of aniline and dodecylbenzene; the first finds use in the dyes industry, whereas the latter is used for the preparation of detergents.
            </p>
        </div>
        <?php
        echo "<div id = \"info_cumene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Cumene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id = "cumene">
            <img src = "../images/Cumene.png">

            <p>
                Cumene, aromatic hydrocarbon commonly found in crude oil and coal tar. It appears as colourless, flammable liquid having a boiling point of 152 °C. Almost all the global production is converted to the hydroperoxide; intermediate in the synthesis of important chemicals such as acetone and phenol. This aromatic is generally stable, however it can form peroxides when exposed to air. It is paramount to verify for the presence of such peroxides before distilling or even heating. As mice exposed to its fumes have developed tumours in their livers and even lungs, the US department of Health added the substance to the official carcinogens list in 2014.
            </p>
        </div>
        <?php
        echo "<div id = \"info_durene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Durene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id = "durene">
            <img src = "../images/Durene.png">

            <p>
                It is a component of coal tar. It is produced by methylation of other methylated benzene compounds such as p-xylene and pseudocumene. In industry, a mixture of xylenes and trimethylbenzenes is alkylated with methanol. Durene can be separated from its isomers by selective crystallisation, exploiting its high melting point, moreover can also account for a significant percentage of the by-products of the process which sees methanol being converted to commercial gasoline. However, the original synthesis involved reaction similar to the selective crystallisation process, where the starting compound was toluene. Durene is relatively toxic for an aromatic hydrocarbons, which tend to have low acute toxicities. As a matter of fact he LD50 for intravenous exposure in mice is 180 mg/kg.
            </p>
        </div>
        <?php
        echo "<div id = \"info_ethylbenzene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Ethylbenzene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id = "ethylbenzene">
            <img src = "../images/Ethylbenzene.png">

            <p>
                Ethylbenzene, highly flammable and colourless liquid characterised by an odour reminiscent of commercial gasoline. The substance has a boiling point of 136 °C and occurs mainly in coal tar and petroleum. The most important use for the substance is as precursor in the styrene production, moreover can be added to commercial fuels as an octane booster and even used as an experimental fuel. The toxicity of the substance is remarkably low for its class, however symptoms such as dizziness, eye and throat sensitivity can occur at elevated concentrations. When emitted into the atmosphere, the substance is generally decomposed by the solar radiation into smog components, while it can easily reach groundwater deposits due to the reason that it does not easily bind to soil.
            </p>
        </div>
        <?php
        echo "<div id = \"info_hemimellitene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Hemimellitene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id = "hemimellitene">
            <img src = "../images/Hemimellitene.png">

            <p>
                Classified as an aromatic hydrocarbon, it is a flammable colourless liquid. It is nearly insoluble in water but soluble in organic solvents. It occurs naturally in coal tar and petroleum. It is one of the three isomers of trimethylbenzene. It is used in jet fuel, mixed with other hydrocarbons, to prevent the formation of solid particles which might damage the engine. As far as it toxicology is concerned, it is worth mentioning that mice exposed to vapours for a few months had altered blood and lung parenchyma composition.
            </p>
        </div>
        <?php
        echo "<div id = \"info_mesitylene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Mesitylene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id = "mesitylene">
            <img src = "../images/Mesitylene.png">

            <p>
                Mesitylene, hydrocarbon found mainly in coal tar characterised by a remarkably sweet odour. The substance boils at approximately 165 °C due to its heavy molecular structure; it normally used as a precursor to trymethylaniline, being the latter an important precursor to colorants. Mesitylene can be used as solvent in the electronics industry and as a fuel additive or even top performance fuel. However, in the latter case the pipes would have to be pre-heated in order to facilitate combustion; as a matter of fact some F1 teams achieved that by routing the fuel lines through the muffler system of the vehicle when using toluene, which has rather similar properties with the exception of being more volatile due to its smaller molecular structure. This hydrocarbon can be found in the polluted atmosphere of major cities alongside polyciclic arenes such as antracene, moreover it has been proven that the substance can be oxidised by ozone and even influence atmospheric chemical reactions.
            </p>
        </div>
        <?php
        echo "<div id = \"info_pseudocumene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Pseudocumene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id = "pseudocumene">
            <img src = "../images/Pseudocumene.png">

            <p>
                Pseudocumene, one of the three trimethylbenzene isomers, appears as a flammable colourless liquid characterised by a strong odour. Similarly to other aromatics, the substance occurs naturally in sources such as coal tar and petroleum. Industrially the substance is obtained through the methylation of lighter aromatics such as toluene and xylene, however it can also be retrieved from the fractional distillation of petroleum. The hydrocarbon can be used as a precursor to high performance polymers and as an octane booster in commercial gasoline. Additional uses include sterilisation procedures in the dyes and perfumes industries.
            </p>
        </div>
        <?php
        echo "<div id = \"info_styrene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Styrene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id ="styrene">
            <img src = "../images/Styrene.png">

            <p>
                Styrene, liquid hydrocarbon that is important chiefly for its marked tendency to undergo polymerization (a process in which individual molecules are linked to produce extremely large, multiple-unit molecules). Styrene is employed in the manufacture of polystyrene, an important plastic, as well as a number of specialty plastics and synthetic rubbers. Pure styrene is a clear, colourless, flammable liquid that boils at 145 °C and freezes at −30.6 °C. Unless treated with inhibitor chemicals, it has a tendency to polymerize spontaneously during storage. It is slightly toxic to the nervous system if ingested or inhaled, and contact with the skin and eyes can cause irritation. Although it is suspected of being carcinogenic, studies have not proved it to be so.
            </p>
        </div>
        <?php
        echo "<div id = \"info_toluene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Toluene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id ="toluene">
            <img src = "../images/Toluene.png">

            <p>
                Toluene, aromatic hydrocarbon used extensively as starting material for the manufacture of industrial chemicals. It comprises 15–20 percent of coal-tar light oil and is a minor constituent of petroleum. Both sources provide toluene for commercial use, but larger amounts are made by catalytic reforming of petroleum naphtha. The compound is used in the synthesis of trinitrotoluene (TNT), benzoic acid, saccharin, dyes, photographic chemicals, and pharmaceuticals. It is also used as a solvent and antiknock additive for aviation gasoline. Pure toluene (melting point, -95° C; boiling point, 110.6° is a colourless, flammable, toxic liquid, insoluble in water but soluble in all common organic solvents.
            </p>
        </div>
        <?php
        echo "<div id = \"info_xylene\">";
        echo "<table><tr>";
        $databaseConnector->displayColumns($databaseConnection);
        echo "</tr><tr>";
        $databaseConnector->displayInformation($databaseConnection, 'Xylene');
        echo "</tr></table>";
        echo "</div>";
        ?>
        <div id ="xylene">
            <img src = "../images/p-Xylene.png">

            <p>
                Xylene, any of three isomeric dimethylbenzenes used as solvents, as components of aviation fuel, and as raw materials for the manufacture of dyes, fibres, and films. The three isomers, designated ortho (o), meta (m), and para (p), differ structurally only in the location of the methyl groups. All three are obtained from coal-tar distillate and petroleum as a mixture containing 50–60 percent by volume of m-xylene and 20–25 percent of each of the other isomers. Fractional distillation of the mixture removes the meta and para isomers, which have very similar boiling points, from the less volatile ortho isomer. The commercial xylene mixture is a colourless, non-viscous, flammable, toxic liquid that is insoluble in water but miscible with many organic liquids. Xylene is commonly used as a solvent for lacquers and rubber cements.
            </p>

        </div>
        <div id = "pageLinks">
            <a href = "homepage.php">Store Home</a>
        </div>
        <div id = "contactDetails">
            <p id = "address">6 Volkner Grove, Waterloo, Lower Hutt, 5011</p>
            <p><a class = "email" href = "mailto:seaviewAromatics@gmail.com">seaviewAromatics@gmail.com</a></p>
        </div>
    </body>
</html>