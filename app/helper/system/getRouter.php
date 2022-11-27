<?php
/**
 * Functions that concern URL 
 */

 /**
  * find page name and verify if it exist
  * @param string $route entered path
  *
  * @return object route from BDD
  */
function getRouteName (string $route):object
{
    $routesConfig = getAllRoutes();
    $page_name = explode("/", $route)[0];
    $currentRoute = explode("/", $route)[0];

    if (isset($routesConfig[$page_name])) {
        $currentRoute = $routesConfig[$page_name];
    } else {
        $currentRoute = $routesConfig['error'];
    }

    return $currentRoute;
}

/**
 * find template's params
 * @param string $route
 * 
 * @return array template's params
 */
function getPageParamsFromMap (string $route):array
{
    $routesConfig = getRouteName($route);
    $mapRoute = $routesConfig->params;
    $urlParams = explode("/", $mapRoute);
    
    return $urlParams;
}

/**
 * find template's params
 * @param string $route
 * 
 * @return array template's params
 */
function getPageParamsFromURL (string $route):array
{
    $explodedURL = explode("/", $route);
    $pageParams = array_splice($explodedURL, 1);

    return $pageParams;
}

/**
 * find current page template
 * @param string $route
 * 
 * @return object template_page
 */
function getRouter (string $route):object
{
    $page_name = getRouteName ($route);
    $pagesTemplatesConfig = getAllPageTemplatesConfig ();
    $retrievePage = $pagesTemplatesConfig[$page_name->page_id];

    return $retrievePage;
}

$q = isset($_GET["q"]) ? $_GET["q"] : ""; // URI
$wantedPage = getRouter($q); // Page template
$wantedPageParamsMap = getPageParamsFromMap ($q); // Params map
$wantedPageParams = getPageParamsFromURL ($q); // Params value
$siteConfig = getSiteConfigByName(); // Params value

$_SESSION['wantedPage'] = $wantedPage;
$_SESSION['wantedPageParamsMap'] = $wantedPageParamsMap;
$_SESSION['wantedPageParams'] = $wantedPageParams;
$_SESSION['siteConfig'] = $siteConfig;