<?php
function getAllRoutes () {
    $sql = "SELECT * FROM route";
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    $routeConfig = arrayToAssociative($req->fetchAll(), 'name');

    return $routeConfig;
}

function getAllPageTemplatesConfig () {
    $sql = "SELECT * FROM template_page";
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    $pageConfig = arrayToAssociative($req->fetchAll(), 'id');
    return $pageConfig;
}

function getTemplateBy ($templateId) {
    $sql = "SELECT * FROM template_part WHERE id=:template_id";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':template_id', $templateId);
    $req->execute();
    $template = $req->fetch();

    return $template->path;
}

function getTagsByPageId ($pageId) {
    $sql = "SELECT * FROM template_page_tag WHERE page_id=:page_id";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':page_id', $pageId);
    $req->execute();
    $tags = $req->fetchAll();

    return $tags;
}

function getNavigationByName ($navigationName) {
    $sql = "SELECT link.* FROM link LEFT JOIN link_group ON link_group.id = link.link_group_id WHERE link_group.name = :navigationName;";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':navigationName', $navigationName);
    $req->execute();
    $navigation = $req->fetchAll();

    return $navigation;
}