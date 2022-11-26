<?php
/**
 * Set navigation block for given navigation's name
 * The created navigation will be like:
 * <ul class="nav-[navigation name]">...</ul>
 * 
 * @param string $navigationName
 * 
 * @return string
 */
function getNavigation ($navigationName):string
{
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

    return $navigationHTLM;
}