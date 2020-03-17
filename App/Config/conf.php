<?php
$root = $_SERVER['DOCUMENT_ROOT'];

return [
    "DEFAULT" => [
        "page" => "Home"
    ],
    "ACTION" => [
        "index" => "indexAction"
    ],
    //i guess the problem is on you path, 
    "PATH" => [
        "view" => $root."/tests/mosco/App/View/",
        "layout" => $root."/tests/mosco/App/Layout/",
        "controller" => $root."/tests/mosco/App/Controller/Page/"
    ]
];

