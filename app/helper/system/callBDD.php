<?php
function getAllRoutes () {
    $sql = "SELECT * FROM route";
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    $routeConfig = arrayToAssociative($req->fetchAll(), 'name');

    return $routeConfig;
}

function getAllPagesConfig () {
    $sql = "SELECT * FROM page";
    $req = prepareQuery()->prepare($sql);
    $req->execute();
    $pageConfig = arrayToAssociative($req->fetchAll(), 'id');
    return $pageConfig;
}

function getTemplateBy ($templateId) {
    $sql = "SELECT * FROM template WHERE id=:template_id";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':template_id', $templateId);
    $req->execute();
    $template = $req->fetch();

    return $template->path;
}

function getTagsByPageId ($pageId) {
    $sql = "SELECT * FROM page_tag WHERE page_id=:page_id";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':page_id', $pageId);
    $req->execute();
    $tags = $req->fetchAll();

    return $tags;
}

function getNavigationByName ($navigationName) {
    $sql = "SELECT url.* FROM url LEFT JOIN url_group ON url_group.id = url.url_group_id WHERE url_group.name = :navigationName;";
    $req = prepareQuery()->prepare($sql);
    $req->bindParam(':navigationName', $navigationName);
    $req->execute();
    $navigation = $req->fetchAll();

    return $navigation;
}