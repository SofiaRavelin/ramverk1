<?php
/**
 * Route form IP-check textform.
 */
return [
    "routes" => [
        [
            "info" => "IP validering",
            "mount" => "apicheck",
            "handler" => "\Anax\Ipcheck\APIController",
        ],
    ]
];
