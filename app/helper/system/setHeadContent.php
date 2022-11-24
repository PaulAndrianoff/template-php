<?php

function setHeadContent ($pageId) {
    $headContent = '';
    $pageOptions = getTagsByPageId ($pageId);

    foreach ($pageOptions as $key => $option) {
        switch ($option->name) {
            case 'title':
                $headContent .= '<title>' . $option->value . '</title>';
                break;
            case 'style':
                $headContent .= '<link rel="stylesheet" href="' . PATH_STYLE . getTemplateBy($option->value). '" />';
                break;
            case 'id':
                break;
                
            default:
                $headContent .= '<meta name="' . $option->name . '" content="' . $option->value .'"/>';
                break;
        }
    }

    return $headContent;
}