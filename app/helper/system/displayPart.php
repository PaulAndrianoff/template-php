<?php

function displayPart ($page, $part) {
    $fileToInclude = '';

    if (isset($page->$part) && '' !== $page->$part) {
        switch ($part) {
            case 'worker':
                $fileToInclude = './app/components' . getTemplateBy($page->$part);
                break;
            
            default:
                $fileToInclude = PATH_VIEW . getTemplateBy($page->$part);
        }
    }

    if ($fileToInclude !== '') {
        include_once $fileToInclude;
    }
}