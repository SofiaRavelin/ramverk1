<?php
/**
 * Route form IP-check textform.
 */
return [
    "routes" => [
        [
            "info" => "IP validering",
            "mount" => "ipcheck",
            "handler" => "\Anax\Ipcheck\IPCheckController",
        ],
    ]
];
