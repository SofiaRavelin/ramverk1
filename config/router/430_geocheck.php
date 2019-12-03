<?php
/**
 * Route form IP-check textform.
 */
return [
    "routes" => [
        [
            "info" => "Geografisk Position",
            "mount" => "geocheck",
            "handler" => "\Anax\Ipcheck\GeoIPCheckController",
        ],
    ]
];
