<?php

function getRouter ($route) {

    $routeConfig = getAllRoutes();
    $pageConfig = getAllPagesConfig ();
    $page = 'error';

    if (isset($routeConfig[$route])) {
        $page = $routeConfig[$route];
    } else {
        $page = $routeConfig[$page];
    }

    $retrievePage = $pageConfig[$page->page_id];

    return $retrievePage;
}

$q = isset($_GET["q"]) ? $_GET["q"] : "";
$wantedPage = getRouter($q);