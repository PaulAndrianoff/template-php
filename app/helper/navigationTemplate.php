<?php

function getNavigation ($navigationName) {
    $navigation = getNavigationByName($navigationName);

    $navigationHTLM = '<ul class="nav-' . str_replace(' ', '-', $navigationName) . '">';
    foreach ($navigation as $link) {
        switch ($link->type) {
            case 'external':
                $navigationHTLM .= '<a href="' . $link->link . '">' . $link->name . '</a>';
                break;
            
            default:
                $navigationHTLM .= '<a href="' . URL . $link->link . '">' . $link->name . '</a>';
                break;
        }
    }

    echo $navigationHTLM;
}