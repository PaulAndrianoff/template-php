<?php
/**
 * Set all tag in the "head" block for current page ID
 * @param int $pageId
 * 
 * @return string
 */
function setHeadContent (int $pageId):string
{
    $headContent = '';
    $pageOptions = getTagsByPageId ($pageId);

    foreach ($pageOptions as $option) {
        switch ($option->name) {
            case 'title':
                $headContent .= '<title>' . SITE_NAME . " - " . $option->value . '</title>';
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
        $headContent .= PHP_EOL;
    }

    return $headContent;
}