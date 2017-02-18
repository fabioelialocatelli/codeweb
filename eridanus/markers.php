<?php
require_once ('modules.php');
$credentials = simplexml_load_file('credentials.xml');
$databaseConnector = new databaseConnector($credentials->hostname, $credentials->port, $credentials->username, $credentials->password, $credentials->database);
$databaseConnector->connectDatabase();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dynamic Markers</title>
        <style>
            #map {
                height: 100%;
            }
            html, body {
                height: 100%;
                margin: 0;
                padding: 0;
            }
            h2 {
                font-family: Helvetica, sans-serif;
                font-size: 14pt;
                font-style: italic;
                color: #ff0000;
                text-decoration: underline;
                text-transform: uppercase;
            }
        </style>
    </head>
    <body>
        <div id="map"></div>
        <script>

            function initMap() {

                var mapContainer = document.getElementById('map');
                var mapOptions = {
                    zoom: 3,
                    center: {lat: 0, lng: 0},
                    mapTypeId: 'roadmap',
                    styles:
                            [
                                //Water Bodies
                                {
                                    "featureType": "water",
                                    "elementType": "all",
                                    "stylers": [{visibility: "on"}, {color: "#000066"}]
                                },
                                {
                                    "featureType": "water",
                                    "elementType": "labels.text.stroke",
                                    "stylers": [{visibility: "off"}]
                                },
                                {
                                    "featureType": "water",
                                    "elementType": "labels.text.fill",
                                    "stylers": [{color: "#3333cc"}]
                                },
                                //Landscape and Artificial
                                {
                                    "featureType": "landscape",
                                    "elementType": "all",
                                    "stylers": [{visibility: "on"}, {color: "#5c5cd6"}]
                                },
                                {
                                    "featureType": "landscape.man_made",
                                    "elementType": "all",
                                    "stylers": [{visibility: "on"}, {color: "#3333cc"}]
                                },
                                //Boundaries and Municipalities
                                {
                                    "featureType": "administrative",
                                    "elementType": "all",
                                    "stylers": [{visibility: "off"}]
                                },
                                {
                                    "featureType": "administrative.locality",
                                    "elementType": "labels",
                                    "stylers": [{visibility: "on"}]
                                },
                                {
                                    "featureType": "administrative.locality",
                                    "elementType": "labels.text.stroke",
                                    "stylers": [{visibility: "off"}]
                                },
                                {
                                    "featureType": "administrative.locality",
                                    "elementType": "labels.text.fill",
                                    "stylers": [{color: "#FFFFFF"}]
                                },
                                //Roads
                                {
                                    featureType: 'road',
                                    elementType: 'geometry',
                                    stylers: [{color: '#38414e'}]
                                },
                                {
                                    featureType: 'road',
                                    elementType: 'geometry.stroke',
                                    stylers: [{color: '#212a37'}]
                                },
                                {
                                    featureType: 'road',
                                    elementType: 'labels.text.stroke',
                                    stylers: [{visibility: 'off'}]
                                },
                                {
                                    featureType: 'road',
                                    elementType: 'labels.text.fill',
                                    stylers: [{color: '#9ca5b3'}]
                                },
                                //Points of Interest
                                {
                                    "featureType": "poi",
                                    "elementType": "all",
                                    "stylers": [{visibility: "off"}]
                                },
                                //Traffic
                                {
                                    "featureType": "transit",
                                    "elementType": "all",
                                    "stylers": [{visibility: "off"}]
                                }
                            ]
                };

                var hydrographicMap = new google.maps.Map(mapContainer, mapOptions);

                /**
                 * RIVER SOURCES
                 */
<?php
$databaseConnector->displayRiverData("sourceLocation");
?>

                /**
                 * RIVER MOUTHS
                 */
<?php
$databaseConnector->displayRiverData("mouthLocation");
?>
            }

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBactPCHGeGUYa0XHhFR-gT-Atzky93rZA&callback=initMap">
        </script>
    </body>
</html>
