<?php
/**
 * Get all available route from BDD
 * 
 * @return array Associative array
 */
function getAllRoutes ():array
{
    $sql = "SELECT * FROM route";
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    $routeConfig = arrayToAssociative($req->fetchAll(), 'name');

    return $routeConfig;
}

/**
 * Get all pages template config fron BDD
 * 
 * @return array Associative array
 */
function getAllPageTemplatesConfig ():array
{
    $sql = "SELECT * FROM template_page";
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    $pageConfig = arrayToAssociative($req->fetchAll(), 'id');
    return $pageConfig;
}

/**
 * Get template path by ID
 * @param int $templateId
 * 
 * @return string template path
 */
function getTemplateBy (int $templateId):string
{
    $sql = "SELECT * FROM template_part WHERE id=:template_id";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':template_id', $templateId);
    $req->execute();
    $template = $req->fetch();

    return $template->path;
}

/**
 * Get all meta tag for current page ID
 * @param int $pageId
 * 
 * @return array<object>
 */
function getTagsByPageId (int $pageId):array
{
    $sql = "SELECT * FROM template_page_tag WHERE page_id=:page_id";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':page_id', $pageId);
    $req->execute();
    $tags = $req->fetchAll();

    return $tags;
}

/**
 * Get all link for current navigation group
 * @param string $navigationName
 * 
 * @return array<object> list of link
 */
function getNavigationByName (string $navigationName):array
{
    $sql = "SELECT link.* FROM link LEFT JOIN link_group ON link_group.id = link.link_group_id WHERE link_group.name = :navigationName;";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':navigationName', $navigationName);
    $req->execute();
    $navigation = $req->fetchAll();

    return $navigation;
}