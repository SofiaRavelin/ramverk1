<?php
/**
 * Route form IP-check textform.
 */
return [
    "routes" => [
        [
            "info" => "Geografisk Position",
            "mount" => "geoapicheck",
            "handler" => "\Anax\Ipcheck\GeoAPIController",
        ],
    ]
];
