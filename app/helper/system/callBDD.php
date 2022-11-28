<?php
/**
 * Get Data from BDD and/or By colum name
 * @param string $tableName
 * @param array<string> $param
 * @param boolean $many
 * 
 * @return mixed Fetched data
 */
function selectValueFromTable ($tableName, $param = [], $many = true)
{
    $sql = '';
    if ([] === $param) {
        $sql = "SELECT * FROM $tableName";
    } else {
        $sql = "SELECT * FROM $tableName WHERE $param[0] like '$param[1]'";
    }

    $req = prepareQuery()->prepare($sql);
    $req->execute();
    
    if (false === $many) {
        return $req->fetch();
    }

    return $req->fetchAll();
}

/**
 * Retrieve all tables in current BDD
 * @return array
 */
function getAllTablesName ():array
{
    $sql = 'SHOW TABLES';
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    
    return $req->fetchAll();
}

/**
 * Retrieve all columns from current table
 * @return array
 */
function getAllColumnsFromTable (string $table):array
{
    $sql = "SHOW COLUMNS FROM $table;";
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    
    return $req->fetchAll();
}

/**
 * Get site configuration by name
 * @param string $site_name Default value: SITE_NAME
 * 
 * @return object
 */
function getSiteConfigByName (string $site_name = SITE_NAME):object
{
    $siteCinfig = selectValueFromTable ('site_config', ['name', $site_name], false);
    return $siteCinfig;
}

/**
 * Get all available route from BDD
 * 
 * @return array Associative array
 */
function getAllRoutes ():array
{
    $routeConfig = arrayToAssociative(selectValueFromTable('route'), 'name');
    return $routeConfig;
}

/**
 * Get all pages template config fron BDD
 * 
 * @return array Associative array
 */
function getAllPageTemplatesConfig ():array
{
    $pageConfig = arrayToAssociative(selectValueFromTable('template_page'), 'id');
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
    $template = selectValueFromTable ('template_part', ['id', $templateId], false);
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
    $tags = selectValueFromTable ('template_page_tag', ['page_id', $pageId]);
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

/**
 * Get all content for current page template
 * @param string $navigationName
 * 
 * @return array<object> list of link
 */
function getContentByTemplateId (int $templateId):array
{
    $sql = "SELECT content.* FROM content LEFT JOIN show_content ON show_content.content_id = content.id WHERE show_content.template_page_id = :templateId;";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':templateId', $templateId);
    $req->execute();
    $conetentArray = $req->fetchAll();

    return $conetentArray;
}